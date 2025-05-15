
<div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCustomerForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editCustomerId">

                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" name="name" id="editName" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="text" name="email" id="editEmail" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="editPhone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" name="address" id="editAddress" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select name="status" id="editStatus" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-sm btn-block">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.edit-customer', function() {
        var customerId = $(this).data('id');
        $.ajax({
            url: '/api/customer-edit/' + customerId,
            method: 'GET',
            success: function(response) {
                $('#editCustomerId').val(response.id);
                $('#editName').val(response.name);
                $('#editEmail').val(response.email);
                $('#editPhone').val(response.phone);
                $('#editAddress').val(response.address);
                $('#editStatus').val(response.status).change();
                // Set form action dynamically
                $('#editCustomerForm').attr('action', '/api/customer-update/' + customerId);

                var modal = new bootstrap.Modal(document.getElementById('editCustomer'));
                modal.show();
            },
            error: function() {
                alert('Failed to fetch customer details.');
            }
        });
    });
</script>
