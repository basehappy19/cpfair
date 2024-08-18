<?php include_once './components/search.php' ?>
<table id="employeeTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>#</td>
            <td>รหัสพนักงาน</td>
            <td>ชื่อพนักงาน</td>
            <td>แผนก</td>
            <td>ตำแหน่ง</td>
            <td>เงินเดือน</td>
            <td>เงินเดือนทั้งสิ้น</td>
            <td>action</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($employees as $em) : ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $em['employee_id'] ?></td>
                <td><?php echo $em['name'] ?></td>
                <td><?php echo $em['department'] ?></td>
                <td><?php echo $em['position'] ?></td>
                <td><?php echo $em['salary'] ?></td>
                <td><?php echo cal_salary($em['salary'], $em['year_joined']) ?></td>
                <td>
                    <a class="btn btn-info" href="?action=edit&id=<?php echo $i - 1 ?>">แก้ไขข้อมูล</a>
                    <a class="btn btn-danger" href="?action=remove&id=<?php echo $i - 1 ?>">ลบ</a>
                </td>
            </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
