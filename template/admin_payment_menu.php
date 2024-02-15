<h2>Payment iDonate</h2>


<table class="wp-list-table widefat fixed striped table-view-list pages">
    <thead>
    <tr>
        <td id="cb" class="manage-column column-cb check-column"><input id="cb-select-all-1" type="checkbox"><label for="cb-select-all-1"><span class="screen-reader-text">Select All</span></label></td>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Name</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Email</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Mobile</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Amount</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>OrderID</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>RefID</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Date</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Description</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Status</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Operation</span></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($payments as $payment): ?>
    <tr>
        <th scope="row" class="check-column">			<input id="cb-select-2" type="checkbox" name="post[]" value="2">
            <label for="cb-select-2"><span class="screen-reader-text">Select Sample Page</span> </label>
        </th>

        <td><?php echo $payment -> name?></td>
        <td><?php echo $payment -> email?></td>
        <td><?php echo $payment -> mobile?></td>
        <td><?php echo number_format($payment -> amount).'$'?></td>
        <td><?php echo $payment -> order_id?></td>
        <td><?php echo $payment -> ref_id?></td>
        <td><?php echo $payment -> date?></td>
        <td><?php echo $payment -> description?></td>
        <td><?php echo status_change($payment -> status) ?></td>
        <td> <a href="<?php echo admin_url().'admin.php?page=idonate-payments&action=delete&id='.$payment->id; ?>"><span class="dashicons dashicons-trash"></span></a> </td>

    </tr>

    <?php endforeach; ?>
    </tbody>

    <tfoot>
    <tr>
        <td id="cb" class="manage-column column-cb check-column"><input id="cb-select-all-1" type="checkbox"><label for="cb-select-all-1"><span class="screen-reader-text">Select All</span></label></td>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Name</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Email</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Mobile</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Amount</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>OrderID</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>RefID</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Date</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Description</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Status</span></th>
        <th scope="col" class="manage-column column-title column-primary sorted asc" ><span>Operation</span></th>
    </tr>

    </tfoot>


</table>