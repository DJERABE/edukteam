<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\StudentBill;
use Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('school_id', Auth::user()->school_id)->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $student_bills = StudentBill::where('school_id', Auth::user()->school_id)->get();
        $payment_types = PaymentType::all();
        return view('payments.create', compact('student_bills', 'payment_types'));
    }

    public function create2(Request $request)
    {
        $this->validate($request, [
            "student_bill" => "required|integer",
            "montant_recu" => "required|numeric",
            "payment_type" => "required|integer",
            "payment_type_num" => "nullable|integer"
        ]);

        $student_bill = StudentBill::findOrFail($request->student_bill);
        $montant_init_recu = $request->montant_recu;
        $payment_type = PaymentType::findOrFail($request->payment_type);
        $payment_type_num = $request->payment_type_num;

        $montant_total_recu = $request->montant_recu;
        
        $expense_configurations = [];
        foreach($student_bill->expense_configurations->sortBy('echeance') as $expense)
        {
            if($montant_total_recu > 0)
            {
                $expense_configuration = [
                    'expense_configuration_id' => $expense->id,
                    'student_bill_id' => $request->student_bill,
                    'unitaire' => $expense->pivot->unitaire,
                    'quantite' => $expense->pivot->quantite,
                    'remise' => $expense->pivot->remise,
                    'montant_attendu' => $expense->pivot->montant_attendu,
                    'montant_paye' => $expense->pivot->montant_paye,
                    'montant_restant' => $expense->pivot->montant_restant,
                    'montant' => $this->get_montant($montant_total_recu, $expense->pivot->montant_attendu, $expense->pivot->montant_paye, $expense->pivot->montant_restant)
                ];
                array_push($expense_configurations, $expense_configuration);
                $montant_total_recu = $montant_total_recu - $this->get_montant($montant_total_recu, $expense->pivot->montant_attendu, $expense->pivot->montant_paye, $expense->pivot->montant_restant);
            }
            else
            {
                $expense_configuration = [
                    'expense_configuration_id' => $expense->id,
                    'student_bill_id' => $request->student_bill,
                    'unitaire' => $expense->pivot->unitaire,
                    'quantite' => $expense->pivot->quantite,
                    'remise' => $expense->pivot->remise,
                    'montant_attendu' => $expense->pivot->montant_attendu,
                    'montant_paye' => $expense->pivot->montant_paye,
                    'montant_restant' => $expense->pivot->montant_restant,
                    'montant' => 0
                ];
                array_push($expense_configurations, $expense_configuration);
            }
        }

        return view('payments.create2', compact('student_bill', 'montant_init_recu', 'payment_type', 'payment_type_num', 'expense_configurations'));
    }

    private function get_montant($montant_total_recu, $montant_attendu, $montant_paye, $montant_restant)
    {
        $montant = 0;
        if($montant_total_recu > $montant_restant)
        {
            $montant = $montant_restant;
        }
        elseif($montant_total_recu <= $montant_restant)
        {
            $montant = $montant_total_recu;
        }
        return $montant;
    }
        
    public function store(Request $request)
    {
        $this->validate($request, [
            "student_bill" => "required|integer",
            "montant_recu" => "required|numeric",
            "payment_type" => "required|integer",
            "payment_type_num" => "nullable|integer",
            "article.*" => "required|integer",
            "unitaire.*" => "required|numeric",
            "quantite.*" => "required|numeric",
            "remise.*" => "required|numeric",
            "montant_attendu.*" => "required|numeric",
            "montant_paye.*" => "required|numeric",
            "montant_restant.*" => "required|numeric",
            "montant.*" => "required|numeric"
        ]);

        $paiement = Payment::create([
            'school_id' => Auth::user()->school_id,
            'montant_recu' => $request->montant_recu,
            'payment_type_id' => $request->payment_type,
            'payment_type_id' => $request->payment_type,
            'payment_type_num' => $request->payment_type_num,
            'student_bill_id' => $request->student_bill,
        ]);
        
        $expense_configurations = [];
        $montant_recu = $request->montant_recu;
        $student_bill = StudentBill::findOrFail($request->student_bill);
        for($i = 0; $i < count($request->article); $i++)
        {
            $expense_configuration = [
                'expense_configuration_id' => $request->article[$i],
                'student_bill_id' => $request->student_bill,
                'unitaire' => $request->unitaire[$i],
                'quantite' => $request->quantite[$i],
                'remise' => $request->remise[$i],
                'montant_attendu' => $request->montant_attendu[$i],
                'montant_paye' => $request->montant_paye[$i] + $request->montant[$i],
                'montant_restant' => $request->montant_restant[$i] - $request->montant[$i]
            ];

            $student_bill->montant_total_paye = $student_bill->montant_total_paye + $request->montant[$i];
            $student_bill->montant_total_restant = $student_bill->montant_total_restant - $request->montant[$i];
            $student_bill->save();

            array_push($expense_configurations, $expense_configuration);
        }
        $student_bill->expense_configurations()->sync($expense_configurations);

        flash('Paiement enregistré avec succès !')->success();
        return redirect()->route('payments.index');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
