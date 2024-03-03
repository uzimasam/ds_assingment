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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="./img/tim.png" alt="Country flag" class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                                                    <h6 class="text-sm mb-0">{{ $user->firstname }} {{ $user->lastname }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Email:</p>
                                                <h6 class="text-sm mb-0">{{ $user->email ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Mobile Number:</p>
                                                <h6 class="text-sm mb-0">{{ $user->mobile_number ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Address:</p>
                                                <h6 class="text-sm mb-0">{{ $user->address ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Reg-Number:</p>
                                                <h6 class="text-sm mb-0">{{ $user->reg_number ?? 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td class="float-end">
                                            <div class="col text-center">
                                                <a href="{{ route('user', $user->id) }}" class="btn btn-sm my-1 bg-primary text-white text-sm mb-0">
                                                    View Profile
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
