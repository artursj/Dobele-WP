<div class="wrap">
    <h1 class="wp-heading-inline">Lists</h1>
    <hr class="wp-header-end">
    <table id="listtable" class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <td>#</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody id="the-list">
            <?php $i = 1; ?>
            <?php foreach($result as $row){ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->email ?></td>
                </tr>
                <?php $i++ ?>
            <?php } ?>
        </tbody>
    </table>
</div>