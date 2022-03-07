<div class="form-group col-md-4">
    <label for="last_name">Last Name</label>&nbsp;<small class="text-danger">*</small>
    <input type="text" class="form-control @error('last_name') {{ 'is-invalid' }}@enderror" id="last_name" name="last_name" placeholder="Type Lastname..." value="{{ old('last_name') ?? $resident->last_name }}">

    @error('last_name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="first_name">First Name</label>&nbsp;<small class="text-danger">*</small>
    <input type="text" class="form-control @error('first_name') {{ 'is-invalid' }}@enderror" id="first_name" name="first_name" placeholder="Type Firstname..." value="{{ old('first_name') ?? $resident->first_name }}">

    @error('first_name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="middle_name">Middle Name (Optional)</label>
    <input type="text" class="form-control @error('middle_name') {{ 'is-invalid' }}@enderror" id="middle_name" name="middle_name" placeholder="Type Firstname..." value="{{ old('middle_name') ?? $resident->middle_name }}">

    @error('middle_name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-2">
    <label for="suffix">Suffix (Optional)</label>
    <input type="text" class="form-control @error('suffix') {{ 'is-invalid' }}@enderror" id="suffix" name="suffix" placeholder="Type Firstname..." value="{{ old('suffix') ?? $resident->suffix }}">

    @error('suffix')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>



<div class="form-group col-md-4">
    <label for="email">Email (Optional)</label>
    <input type="text" class="form-control @error('email') {{ 'is-invalid' }}@enderror" id="email" name="email" placeholder="Ex. email@example.com " value="{{ old('email') ?? $resident->email }}">

    @error('email')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-2">
    <label for="gender">Gender</label>

    <select class="custom-select  @error('gender') {{ 'is-invalid' }}@enderror"
            name="gender" id="gender">
        <option value="">Choose ...</option>
        <option value="male" {{ old('gender') == 'male' ?? $resident->gender == 'male' ? 'selected' : ''}}>Male</option>
        <option value="female" {{ old('gender') == 'female' ?? $resident->gender == 'female' ? 'selected' : ''}}>Female</option>
    </select>

    @error('gender')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="civil_status">Civil Status</label>

    <select class="custom-select  @error('civil_status') {{ 'is-invalid' }}@enderror"
            name="civil_status" id="civil_status">
        <option value="">Choose ...</option>
        <option value="single" {{ old('civil_status') == 'single' ?? $resident->civil_status == 'single' ? 'selected' : ''}}>Single</option>
        <option value="married" {{ old('civil_status') == 'married' ?? $resident->civil_status == 'married' ? 'selected' : ''}}>Married</option>
    </select>

    @error('civil_status')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="citizenship">Citizenship (Optional)</label>
    <input type="text" class="form-control @error('citizenship') {{ 'is-invalid' }}@enderror" id="citizenship" name="citizenship" placeholder="Type Firstname..." value="{{ old('citizenship') ?? $resident->citizenship }}">

    @error('citizenship')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-4">
    <label for="occupation">Occupation (Optional)</label>
    <input type="text" class="form-control @error('occupation') {{ 'is-invalid' }}@enderror" id="occupation" name="occupation" placeholder="Type Firstname..." value="{{ old('occupation') ?? $resident->occupation }}">

    @error('occupation')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-4">
    <label for="mobile_no">Mobile No (Optional)</label>
    <input type="text" class="form-control @error('mobile_no') {{ 'is-invalid' }}@enderror" id="mobile_no" name="mobile_no" placeholder="Type Firstname..." value="{{ old('mobile_no') ?? $resident->mobile_no }}">

    @error('mobile_no')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-4">
    <label for="landline">Landline (Optional)</label>
    <input type="text" class="form-control @error('landline') {{ 'is-invalid' }}@enderror" id="landline" name="landline" placeholder="Type Firstname..." value="{{ old('landline') ?? $resident->landline }}">

    @error('landline')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-6">
    <label for="address">Address</label>
    <textarea type="text" class="form-control @error('address') {{ 'is-invalid' }}@enderror" id="address" name="address" placeholder="Type Firstname..." value="">{{ old('address') ?? $resident->address }}</textarea>

    @error('address')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="date_of_birth">Date of Birth (Optional)</label>
    <input type="date" class="form-control @error('date_of_birth') {{ 'is-invalid' }}@enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') ?? $resident->date_of_birth }}">

    @error('date_of_birth')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="place_of_birth">Place of Birth (Optional)</label>
    <input type="text" class="form-control @error('place_of_birth') {{ 'is-invalid' }}@enderror" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') ?? $resident->place_of_birth }}" placeholder="Ex. Quezon City">

    @error('place_of_birth')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>


<div class="form-group col-md-6">
    <label for="is_voter">Are you a registered voter in this brangay?</label>

    <select class="custom-select  @error('is_voter') {{ 'is-invalid' }}@enderror"
            name="is_voter" id="is_voter">
        <option value="">Choose ...</option>
        <option value="1" {{ old('is_voter') == '1' ?? $resident->is_voter == '1' ? 'selected' : ''}}>Yes</option>
        <option value="0" {{ old('is_voter') == '0' ?? $resident->is_voter == '0' ? 'selected' : ''}}>No</option>
    </select>

    @error('is_voter')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group col-md-6">
    <label for="">Households</label>

    <select class="custom-select  @error('household_id') {{ 'is-invalid' }}@enderror"
            name="household_id">
        <option value="">Choose ...</option>
            @foreach ($households as $household)
                <option value="{{ $household->id }}"
                        {{ old('household_id') == $household->id  ?? $resident->household_id == $household->id ? 'selected' : '' }}>
                    {{ $household->family_name }}
                </option>
            @endforeach
    </select>

    @error('household_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>