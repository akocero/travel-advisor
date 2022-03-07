@extends('layouts.main')


@section("title","Resident")

@section('content')
    <div class="card">
        <div class="col-12 pt-3 px-4 d-flex justify-content-between align-items-center">
            <h4 class="h4">Update {{Str::ucfirst($resident->last_name)}}, {{Str::ucfirst($resident->first_name)}}</h4>
            <a style="float: right" href="{{ route('residents.index') }}" class="btn btn-light">
                Resident List
                <i class="far fa-arrow-alt-circle-left ml-2 icon-view-all"></i>
            </a>
        </div>
        
        <div class="card-body">
            <form action="{{ route('residents.update', $resident->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                    <li class="nav-item ">
                        <a class="nav-link active" id="pills-personal-info-tab " data-toggle="pill" href="#pills-personal-info" role="tab" aria-controls="pills-personal-info" aria-selected="true">Personal Info</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-image-tab" data-toggle="pill" href="#pills-image" role="tab" aria-controls="pills-image" aria-selected="false">Image</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-voters-details-tab" data-toggle="pill" href="#pills-voters-details" role="tab" aria-controls="pills-voters-details" aria-selected="false">Voters Details</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-medical-history-tab" data-toggle="pill" href="#pills-medical-history" role="tab" aria-controls="pills-medical-history" aria-selected="false">Medical history</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-other-info-tab" data-toggle="pill" href="#pills-other-info" role="tab" aria-controls="pills-other-info" aria-selected="false">Other Info.</a>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    {{-- Personal info tab  --}}

                    <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel" aria-labelledby="pills-personal-info-tab">

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>&nbsp;<small class="text-danger">*</small>
                                <input type="text" class="form-control @error('last_name') {{ 'is-invalid' }}@enderror" id="last_name" name="last_name" placeholder="Type Lastname..." value="{{ $resident->last_name  }}">

                                @error('last_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="first_name">First Name</label>&nbsp;<small class="text-danger">*</small>
                                <input type="text" class="form-control @error('first_name') {{ 'is-invalid' }}@enderror" id="first_name" name="first_name" placeholder="Type Firstname..." value="{{ $resident->first_name  }}">

                                @error('first_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="middle_name">Middle Name (Optional)</label>
                                <input type="text" class="form-control @error('middle_name') {{ 'is-invalid' }}@enderror" id="middle_name" name="middle_name" placeholder="Type Firstname..." value="{{ $resident->middle_name  }}">

                                @error('middle_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="suffix">Suffix (Optional)</label>
                                <input type="text" class="form-control @error('suffix') {{ 'is-invalid' }}@enderror" id="suffix" name="suffix" placeholder="Type Firstname..." value="{{ $resident->suffix  }}">

                                @error('suffix')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nick_name">Nick Name/Alias (Optional)</label>
                                <input type="text" class="form-control @error('nick_name') {{ 'is-invalid' }}@enderror" id="nick_name" name="nick_name" placeholder="Type Firstname..." value="{{ $resident->nick_name }}">

                                @error('nick_name')
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
                                    <option value="male" {{ $resident->gender == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{ $resident->gender == 'female' ? 'selected' : ''}}>Female</option>
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
                                    <option value="single" {{ $resident->civil_status  == 'single' ? 'selected' : ''}}>Single</option>
                                    <option value="married" {{ $resident->civil_status  == 'married' ? 'selected' : ''}}>Married</option>
                                </select>

                                @error('civil_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="spouse_name">Spouse Name (Optional)</label>
                                <input type="text" class="form-control @error('spouse_name') {{ 'is-invalid' }}@enderror" id="spouse_name" name="spouse_name" placeholder="Type Firstname..." value="{{ $resident->spouse_name }}">

                                @error('spouse_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="citizenship">Citizenship (Optional)</label>
                                <input type="text" class="form-control @error('citizenship') {{ 'is-invalid' }}@enderror" id="citizenship" name="citizenship" placeholder="Type Firstname..." value="{{ $resident->citizenship}}">

                                @error('citizenship')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="resident_status">Resident Status</label>

                                <select class="custom-select  @error('resident_status') {{ 'is-invalid' }}@enderror"
                                        name="resident_status" id="resident_status">
                                    <option value="">Choose ...</option>
                                    <option value="permanent" {{ $resident->resident_status  == 'permanent' ? 'selected' : ''}}>Permanent</option>
                                    <option value="temporary" {{ $resident->resident_status  == 'temporary' ? 'selected' : ''}}>Temporary</option>
                                </select>

                                @error('resident_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="religion">Religion (Optional)</label>
                                <input type="text" class="form-control @error('religion') {{ 'is-invalid' }}@enderror" id="religion" name="religion" placeholder="Type Firstname..." value="{{ $resident->religion }}">

                                @error('religion')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="occupation">Occupation (Optional)</label>
                                <input type="text" class="form-control @error('occupation') {{ 'is-invalid' }}@enderror" id="occupation" name="occupation" placeholder="Type Firstname..." value="{{ $resident->occupation  }}">

                                @error('occupation')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="purok_id">Purok</label>

                                <select class="custom-select  @error('purok_id') {{ 'is-invalid' }}@enderror"
                                        name="purok_id">
                                    <option value="">Choose ...</option>
                                        @foreach ($puroks as $purok)
                                            <option value="{{ $purok->id }}"
                                                    {{ $resident->purok_id == $purok->id ? 'selected' : '' }}>
                                                {{ $purok->name }}
                                            </option>
                                        @endforeach
                                </select>

                                @error('purok_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-8">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control @error('address') {{ 'is-invalid' }}@enderror" id="address" name="address" placeholder="Type Firstname..." value="">{{ $resident->address }}</textarea>

                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="date_of_birth">Date of Birth (Optional)</label>
                                <input type="date" class="form-control @error('date_of_birth') {{ 'is-invalid' }}@enderror" id="date_of_birth" name="date_of_birth" value="{{ $resident->date_of_birth }}">

                                @error('date_of_birth')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="place_of_birth">Place of Birth (Optional)</label>
                                <input type="text" class="form-control @error('place_of_birth') {{ 'is-invalid' }}@enderror" id="place_of_birth" name="place_of_birth" value="{{ $resident->place_of_birth }}" placeholder="Ex. Quezon City">

                                @error('place_of_birth')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>
                        
                    </div>

                    {{-- End Personal info tab  --}}

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="email">Email (Optional)</label>
                                <input type="text" class="form-control @error('email') {{ 'is-invalid' }}@enderror" id="email" name="email" placeholder="Ex. email@example.com " value="{{ $resident->email  }}">

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            

                            <div class="form-group col-md-4">
                                <label for="mobile_no">Mobile No (Optional)</label>
                                <input type="text" class="form-control @error('mobile_no') {{ 'is-invalid' }}@enderror" id="mobile_no" name="mobile_no" placeholder="Type Firstname..." value="{{ $resident->mobile_no }}">

                                @error('mobile_no')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="landline">Landline (Optional)</label>
                                <input type="text" class="form-control @error('landline') {{ 'is-invalid' }}@enderror" id="landline" name="landline" placeholder="Type Firstname..." value="{{ $resident->landline }}">

                                @error('landline')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-voters-details" role="tabpanel" aria-labelledby="pills-voters-details-tab">

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="is_voter">Registered Voter?</label>

                                <select class="custom-select  @error('is_voter') {{ 'is-invalid' }}@enderror"
                                        name="is_voter" id="is_voter">
                                    <option value="">Choose ...</option>
                                    <option value="1" {{ $resident->is_voter  == '1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ $resident->is_voter  == '0' ? 'selected' : ''}}>No</option>
                                </select>

                                @error('is_voter')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="precinct_no">Precinct No (Optional)</label>
                                <input type="text" class="form-control @error('precinct_no') {{ 'is-invalid' }}@enderror" id="precinct_no" name="precinct_no" placeholder="Type Firstname..." value="{{ $resident->precinct_no }}">

                                @error('precinct_no')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>
                        
                    </div>

                    <div class="tab-pane fade" id="pills-medical-history" role="tabpanel" aria-labelledby="pills-medical-history-tab">

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="covid_positive">Covid Positive</label>

                                <select class="custom-select  @error('covid_positive') {{ 'is-invalid' }}@enderror"
                                        name="covid_positive" id="covid_positive">
                                    <option value="0" {{ $resident->covid_positive  == '0' ? 'selected' : ''}}>No</option>
                                    <option value="1" {{ $resident->covid_positive  == '1' ? 'selected' : ''}}>Yes / Active</option>
                                    <option value="2" {{ $resident->covid_positive  == '2' ? 'selected' : ''}}>Yes / Recovered</option>
                                </select>

                                @error('covid_positive')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="covid_symptoms">Covid Symptoms</label>

                                <select class="custom-select  @error('covid_symptoms') {{ 'is-invalid' }}@enderror"
                                        name="covid_symptoms" id="covid_symptoms">
                                    <option value="">Choose ...</option>
                                    <option value="0" {{ $resident->covid_symptoms  == '0' ? 'selected' : ''}}>Not Sure</option>
                                    <option value="1" {{ $resident->covid_symptoms  == '1' ? 'selected' : ''}}>Asymptomatic</option>
                                    <option value="2" {{ $resident->covid_symptoms  == '2' ? 'selected' : ''}}>Symptomatic</option>
                                </select>

                                @error('covid_symptoms')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="medical_remarks">Medical History Remarks (Optional)</label>
                                <textarea type="text" class="form-control @error('medical_remarks') {{ 'is-invalid' }}@enderror" id="medical_remarks" name="medical_remarks" placeholder="Type Firstname..." value="">{{ $resident->medical_remarks }}</textarea>

                                @error('medical_remarks')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-other-info" role="tabpanel" aria-labelledby="pills-other-info-tab">

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="">Households</label>

                                <select class="custom-select  @error('household_id') {{ 'is-invalid' }}@enderror"
                                        name="household_id">
                                    <option value="">Choose ...</option>
                                        @foreach ($households as $household)
                                            <option value="{{ $household->id }}"
                                                    {{ $resident->household_id  == $household->id ? 'selected' : '' }}>
                                                {{ $household->name }}
                                            </option>
                                        @endforeach
                                </select>

                                @error('household_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            

                            <div class="form-group col-md-4">
                                <label for="educational_attainment">Educational Attainment</label>

                                <select class="custom-select  @error('educational_attainment') {{ 'is-invalid' }}@enderror"
                                        name="educational_attainment" id="educational_attainment">
                                    <option value="">Choose ...</option>
                                    <option value="college" {{ $resident->educational_attainment == 'college' ? 'selected' : ''}}>College Graduate</option>
                                    <option value="secondary" {{ $resident->educational_attainment  == 'secondary' ? 'selected' : ''}}>Secondary</option>
                                </select>

                                @error('educational_attainment')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="employment_status">Employment Status</label>

                                <select class="custom-select  @error('employment_status') {{ 'is-invalid' }}@enderror"
                                        name="employment_status" id="employment_status">
                                    <option value="">Choose ...</option>
                                    <option value="employed" {{ $resident->employment_status  == 'employed' ? 'selected' : ''}}>Employed</option>
                                    <option value="unemployed" {{ $resident->employment_status  == 'unemployed' ? 'selected' : ''}}>Unemployed</option>
                                </select>

                                @error('employment_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label for="complexion">Complexion (Optional)</label>
                                <input type="text" class="form-control @error('complexion') {{ 'is-invalid' }}@enderror" id="complexion" name="complexion" placeholder="Type Firstname..." value="{{ $resident->complexion  }}">

                                @error('complexion')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="blood_type">Blood Type (Optional)</label>
                                <input type="text" class="form-control @error('blood_type') {{ 'is-invalid' }}@enderror" id="blood_type" name="blood_type" placeholder="Type Firstname..." value="{{ $resident->blood_type  }}">

                                @error('blood_type')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="is_disabled">Person with disablity</label>

                                <select class="custom-select  @error('is_disabled') {{ 'is-invalid' }}@enderror"
                                        name="is_disabled" id="is_disabled">
                                    <option value="">Choose ...</option>
                                    <option value="1" {{ $resident->is_disabled  == '1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ $resident->is_disabled  == '0' ? 'selected' : ''}}>No</option>
                                </select>

                                @error('is_disabled')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="remarks">Remarks (Optional)</label>
                                <textarea type="text" class="form-control @error('remarks') {{ 'is-invalid' }}@enderror" id="remarks" name="remarks" placeholder="Type Firstname..." value="">{{ $resident->remarks }}</textarea>

                                @error('remarks')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab">

                        <div class="row">

                            @if ($resident->image_path)
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $resident->image_path) }}" alt="" class="img-thumbnail">
                                </div>
                            @else
                                <div class="col-md-4">
                                    <h5>No image found!</h5>
                                </div>
                            @endif

                            <div class="form-group col-md-4">
                                <label for="image_path">Update Image (Optional)</label>
                                <input type="file" class="form-control-file @error('image_path') {{ 'is-invalid' }}@enderror" id="image_path" name="image_path" placeholder="Type Firstname..." value="">

                                @error('image_path')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Use Camera instead</label><br>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-camera-retro mr-2"></i>
                                    Open Camera 
                                </button>
                            </div>
                            

                        </div>
                        
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Save Changes" class="btn btn-custom-success float-right px-5"> 
                    </div>
                </div>
                    

                </div>
            </form>
        </div>
    </div>
@endsection
