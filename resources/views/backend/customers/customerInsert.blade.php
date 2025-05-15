<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Register a New Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST" class="text-start mb-3">
                    <div class="mb-2">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
                    </div>

                    <div class="mb-2">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="mb-2">
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter phone">
                    </div>

                    <div class="mb-2">
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter address">
                    </div>

                    <div class="mb-2">
                        <select name="status" class="form-control select2">
                            <option value="" disabled selected>Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="password" id="password" class="form-control" placeholder="Enter password">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary text-upperance" type="submit">REGISTER A NEW CUSTOMER</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
