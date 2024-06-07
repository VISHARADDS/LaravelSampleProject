<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>

    <!-- CSS Files -->
   
    <link rel="stylesheet" href="{{ asset('css/headerUI.css') }}"/>
   
</head>
<body>
    
<div class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/dashboard">
                <div style="display:flex">
                    <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img" alt="main_logo"/>
                    <span class="ms-2 font-weight-bold text-white" style="margin-top:10px">MAZZA GALLERIE</span>
                </div>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2"/>
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/dashboard">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">face</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0">
            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="/" type="button">
                    <i class="material-icons opacity-10">login</i>
                    <span class="nav-link-text ms-3">Sign Out</span>
                </a>
            </div>
        </div>
    </aside>
 
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Admin Users</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <input style="width:300px;height:40px" type="text" class="form-control" placeholder="Search Users..."
                               id="searchContacts" />
                        <button class="btn btn-primary" type="button">
                            <i class="material-icons opacity-10">search</i>
                        </button>
                    </div>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="material-icons opacity-10">notifications</i>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="material-icons opacity-10">settings</i>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="material-icons opacity-10">person</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">ADMIN USER TABLE</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 align-items-center table-flush" responsive="true">
                                <thead>
                                    <tr>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-3">USER ID</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">Name</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">Email</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">NIC</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">DOB</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">Mobile</th>
                                        <th style="color:black" class="text-uppercase text-sm opacity-7 ps-2">Last updated</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($adminUser as $item)
                                    <tr>
                                        <td>
                                            <div class="px-2 py-1">
                                                <div>
                                                    <p style="font-size:14px" class="font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 style="color:black" class="mb-0 text-sm">{{ $item->name }}</h6>
                                        </td>
                                        <td class="align-justify text-justify text-sm">
                                            <p style="font-size:14px" class="font-weight-bold mb-0">{{ $item->email }}</p>
                                        </td>
                                        <td class="align-justify text-justify text-sm">
                                            <p style="font-size:14px" class="font-weight-bold mb-0">{{ $item->nic }}</p>
                                        </td>
                                        <td class="align-justify text-justify text-sm">
                                            <p style="font-size:14px" class="font-weight-bold mb-0">{{ $item->dob }}</p>
                                        </td>
                                        <td class="align-justify text-justify text-sm">
                                            <p style="font-size:14px" class="font-weight-bold mb-0">{{ $item->mobile }}</p>
                                        </td>
                                        <td class="align-justify text-justify text-sm">
                                            <p style="font-size:14px" class="font-weight-bold mb-0">{{ $item->updated_at }}</p>
                                        </td>
                                        <td>
                                            <div style="display: flex">
                                                <div style="padding: 0; display: flex; align-items: center">
                                                    <button style="width: 40px; height: 40px" type="button" class="btn btn-success d-flex justify-content-center align-items-center">
                                                        <i class="material-icons opacity-10">book</i>
                                                    </button>
                                                </div>
                                                <div style="margin-left: 10px; display: flex; align-items: center">
                                                    <button style="width: 40px; height: 40px" type="button" class="btn btn-danger d-flex justify-content-center align-items-center">
                                                        <i class="material-icons opacity-10">delete</i>
                                                    </button>
                                                </div>
                                                <div style="margin-left: 10px; display: flex; align-items: center">
                                                    <button style="width: 40px; height: 40px" type="button" class="btn btn-info d-flex justify-content-center align-items-center">
                                                        <i class="material-icons opacity-10">download</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> 
</div>

</body>
</html>
