<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Ecole*</label>
            <select class="form-control" name="school" id="school">
                <option value="">--</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->nom }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Année scolaire*</label>
            <select class="select2 form-control" name="academic_year" id="academic_year">
                <option value="">--</option>
            </select>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Classe*</label>
            <select class="select2 form-control" name="classe" id="classe">
                <option value="">--</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Eleve*</label>
            <select class="select2 form-control" name="student" id="student">
                <option value="">--</option>
            </select>
        </div>
    </div>
</div>