@include("layouts.header")
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">



                <!-- List DataTable -->
                <div class="row">
                    <div class="col-12">
                        <div class="card invoice-list-wrapper">
                            <div class="card-datatable table-responsive">
                                {{--<div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        <!-- <h6 class="mb-0">DataTable with Buttons</h6> -->
                                    </div>
                                    <div class="dt-action-buttons text-end">
                                        <div class="dt-buttons d-inline-flex">
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-success mb15 ml15"><i
                                                    class="fa fa-thumbs-up"></i>Approved List

                                            </a>
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-warning mb15 ml15"><i
                                                    class=" fa fa-thumbs-down "></i>Unapproved List

                                            </a>
                                            <a href="#" style="margin: 0px 8px;" class="btn btn-danger mb15 ml15"><i
                                                    class=" fa fa-user-times "></i>Suspend List</a>
                                            <button
                                                class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                                tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                aria-haspopup="true">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-share font-small-4 me-50">
                                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                        <polyline points="16 6 12 2 8 6"></polyline>
                                                        <line x1="12" y1="2" x2="12" y2="15"></line>
                                                    </svg>Export
                                                </span>
                                            </button>
                                            <button class="dt-button create-new btn btn-primary" tabindex="0"
                                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                                                data-bs-target="#modals-slide-in">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-plus me-50 font-small-4">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>Add New
                                                </span>
                                            </button>

                                        </div>
                                    </div>
                                </div>--}}
                                <!-- Basic Tables start -->
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> Highlighted Jobs List</h4>
                                            </div>
                                            <div class="card-header">
                                                @if (Session::has('flash_message'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('flash_message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <!-- <p class="card-text">
                                                        Using the most basic table Leanne Grahamup, here’s how
                                                        <code>.table</code>-based tables look in Bootstrap. You
                                                        can use any example of below table for your table and it can be
                                                        use with any type of bootstrap tables.
                                                    </p> -->
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job Title</th>
                                                            <th>Category</th>
                                                            <th>Job Industry</th>
                                                            <th>Function Area Hire</th>
                                                            <th>Job Salary</th>
                                                            <th>Company Hiring For</th>
                                                            <th>Job Status</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $iii = 1;
                                                            
                                                        @endphp

                                                        @foreach ($jobs as $job)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" {{ (isset($job->highlight_job_status) && $job->highlight_job_status == 1 ? "checked" : '')}} class="idrecentimp" onchange="mark_imp_recent({{$job->id}}, this.checked)" name="{{ $job->id }}" style="margin-right: 5px;">
                                                                {{ $iii }}
                                                            </td>
                                                            
                                                            <td>{{$job->job_title}}</td>
                                                            <td>{{$job->category}}</td>
                                                            <td>{{$job->job_industry}}</td>
                                                            <td>{{$job->job_functional_area}}</td>
                                                            <td>{{$job->min_salary}}-{{$job->max_salary}}</td>
                                                            <td>{{$job->company_hiring_for}}</td>
                                                            <td>{{$job->job_status}}</td>
                                                            
                                                        </tr>
                                                        @php
                                                            $iii++;
                                                        @endphp
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Basic Tables end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ List DataTable -->


            </div>
        </div>
    </div>
    <!-- END: Content-->

@include("layouts.footer")
<script type="text/javascript">
    function mark_imp_recent(id, value) {
        $.ajax({
            url: "/admin/job/mark-imp-job",
            method: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id,
                value: value
            },
            success: function(response) {
                location.reload();
                if (response.error === false) {
                    // alert('Location details status has been changed');
                } else {
                    // alert('Oops something went wrong!');
                }
            }
        });
    }
</script>