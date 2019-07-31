 <ul id="sidebarnav">
                         <li class="nav-small-cap">-----  MENU</li>
    <li>
        <a class="waves-effect waves-dark" href="{{ route('home') }}"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tableau de Bord</span></a>
    </li>
    @if(Auth::user()->can('view_roles') || Auth::user()->can('view_users'))
        <li>
            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">COMPTES</span></a>
            <ul aria-expanded="false" class="collapse">
                @can('view_roles')
                    <li><a href="{{ route('roles.index') }}">Rôles</a></li>
                @endcan

                @can('view_users')
                    <li><a href="{{ route('users.index') }}">Comptes</a></li>
                @endcan
            </ul>
        </li>
    @endif
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">PARAMETRES</span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="{{ route('schools.index') }}">Établissements</a></li>
            <li> <a href="{{ route('academicyears.index') }}">Années academiques</a></li>
            <li> <a href="{{ route('sessions.index') }}">Sessions</a></li>
            <li> <a href="{{ route('studylevels.index') }}">Niveaux d'études</a></li>
            <li> <a href="{{ route('classes.index') }}"> Classes </a></li>
            <li> <a href="{{ route('families.index') }}">Famille</a></li>
            <li> <a href="{{ route('contacts.index') }}">Parents Élèves </a></li>

        </ul>
    </li>
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu">MATIERES</span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="{{ route('subjectcategories.index') }}">Catégories</a></li>
            <li> <a href="{{ route('subjects.index') }}">Matières</a></li>
            <li> <a href="{{ route('professors.index') }}">Professeurs</a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-outline"></i><span class="hide-menu">GESTION DES NOTES</span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="{{ route('students.index') }}"> Enregistrement des Notes </a></li>
        </ul>
    </li>

    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-outline"></i><span class="hide-menu">EDITER BULLETIN</span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="{{ route('students.index') }}"> Editer </a></li>
            <li> <a href="{{ route('students.index') }}"> Bulletin </a></li>
            <li> <a href="{{ route('students.index') }}"> Imprimer </a></li>
              
        </ul>
    </li>

    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-outline"></i><span class="hide-menu">ELEVES</span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="{{ route('students.index') }}"> Élèves </a></li>
            <li> <a href="{{ route('students.trashed') }}"> Restaurer Élèves </a></li>
            
             <li> <a href="{{ route('guardians.index') }}"> Parents Élèves </a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wallet"></i><span class="hide-menu">Comptabilité</span></a>
        <ul aria-expanded="false" class="collapse">
            {{-- <li> <a href="{{ route('echeances.index') }}">Echeance</a></li> --}}
            <li> <a href="{{ route('expenses.index') }}">Frais</a></li>
            <li> <a href="{{ route('expense-configurations.index') }}">Configuration de frais</a></li>
            <li> <a href="{{ route('student_bills.index') }}">Factures</a></li>
            <li> <a href="{{ route('payments.index') }}">Paiements</a></li>
        </ul>
    </li>
    
</ul>

