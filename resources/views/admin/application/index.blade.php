@extends('admin.layout.admin.app')

@section('style')
<style>
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .simplebar-offset {
    height: auto !important;
}

.footer {
    margin-left: 0px !important;
}

.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 26px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 26px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:checked+.slider:before {
    transform: translateX(24px);
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 style="color: #1e2f65;font-family: sans-serif;">Application</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a>
                    </li>

                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    

           <div class="table-responsive">
    <table class="display" id="data-source-1" style="width:100%">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Full Name</th>
                <th>Mobile Number</th>
                <th>Email Address</th>
                <th>City</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Ramesh Varma</td>
                <td>+91 9876543210</td>
                <td>ramesh@gmail.com</td>
                <td>Bengaluru</td>
                <td class="text-center">
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                        
                        <a href="#" class="btn btn-sm btn-info text-white" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        
                    </div>
                </td>
            </tr>

            <tr>
                <td class="text-center">2</td>
                <td>Priya Sharma</td>
                <td>+91 9876501234</td>
                <td>priya@gmail.com</td>
                <td>Mysuru</td>
                <td class="text-center">
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                       
                        <a href="#" class="btn btn-sm btn-info text-white" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        
                    </div>
                </td>
            </tr>

            <tr>
                <td class="text-center">3</td>
                <td>Arun Kumar</td>
                <td>+91 9988776655</td>
                <td>arun@gmail.com</td>
                <td>Mangaluru</td>
                <td class="text-center">
                    <span class="badge bg-danger">Inactive</span>
                </td>
                <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                       
                        <a href="#" class="btn btn-sm btn-info text-white" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                       
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 


@endsection
