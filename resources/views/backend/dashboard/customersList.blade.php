<div class="page-container">
    <div class="row">
        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h4 class="header-title me-auto">Recent New Users</h4>

                    <div class="d-flex gap-2 justify-content-end text-end">
                        <a href="javascript:void(0);" class="btn btn-sm btn-light">
                            <i class="ri-download-line ms-1"></i>
                            Add New
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="bg-light bg-opacity-50 py-1 text-center">
                        <p class="m-0">Total Customers <span class="fw-medium"><span id="customerCount">0</span></span>
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table id="customersData" class="table table-custom table-centered table-sm table-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/customerList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                let count = response.customers.length;
                // Update customer count
                $('#customerCount').text(count);
                response.customers.forEach(function(customer) {
                    rows += `<tr>
                        <td>${customer.id}</td>
                        <td>${customer.name}</td>
                        <td>${customer.email}</td>
                        <td>${customer.phone}</td>
                        <td class="text-center">${customer.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-customer" data-id="${customer.id}">View</button>
                            <button class="btn btn-primary btn-sm waves-effect waves-light edit-customer" data-id="${customer.id}">Edit</button>
                        </td>
                    </tr>`;
                });
                $('#customersData tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching customers');
                console.error(err);
            }
        });
    });
</script>