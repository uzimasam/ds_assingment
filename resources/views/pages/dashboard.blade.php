@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Contacts</h6>
                            <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addContactModal">
                                Add Contact
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-items-center table-striped table-flush">
                            <tbody>
                                @forelse(auth()->user()->contacts as $contact)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="{{ asset('img/tim.png') }}" alt="User Avatar" class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                                                    <h6 class="text-sm mb-0">{{ $contact->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Email:</p>
                                                <h6 class="text-sm mb-0">{{ $contact->email ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Mobile Number:</p>
                                                <h6 class="text-sm mb-0">{{ $contact->phone ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Address:</p>
                                                <h6 class="text-sm mb-0">{{ $contact->address ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Reg-Number:</p>
                                                <h6 class="text-sm mb-0">{{ $contact->registration_number ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="align-middle text-center" colspan="5">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4 text-center">
                                                    <p class="text-xs font-weight-bold mb-0">No contacts found</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
        <!-- Add Contact Modal -->
            <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-primary">Add Contact</h3>
                                    <p class="mb-0">Fill in the information below to create a new Contact</p>
                                </div>
                                <div class="card-body pb-3">
                                    <form role="form text-left" method="post" action="{{ route('contact.store') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <label>Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="tag-addon" name="name" required autofocus>
                                        </div>
                                        <label>Email</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="tag-addon" name="email" required>
                                        </div>
                                        <label>Phone</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="tag-addon" name="phone" required>
                                        </div>
                                        <label>Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="tag-addon" name="address" required>
                                        </div>
                                        <label>Registration Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Registration Number" aria-label="Registration Number" aria-describedby="tag-addon" name="registration_number" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-primary text-white btn-lg btn-rounded w-100 mt-4 mb-0">Create Contact</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                    <p class="mb-4 mx-auto"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Add Contact Modal -->
    </div>
@endsection
