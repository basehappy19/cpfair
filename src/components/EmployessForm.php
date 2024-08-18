<?php require_once './action/Edit.php'; ?>

<form action="" method="post">
    <div class="mb-3">
        <label for="employee_id" class="form-label">รหัสพนักงาน</label>
        <input class="form-control" type="number" name="employee_id" id="employee_id" value="<?php echo isset($employeeById['employee_id']) ? $employeeById['employee_id'] : "" ?>" placeholder="12345" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">ชื่อ</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo isset($employeeById['name']) ? $employeeById['name'] : "" ?>" placeholder="สมชาย" required>
    </div>
    <div class="mb-3">
        <label for="department" class="form-label">แผนก</label>
        <select class="form-control" name="department" id="department">
            <option value="">-- โปรดเลือกแผนก --</option>
            <option value="การเงิน" <?php echo isset($employeeById) && $employeeById['department'] == "การเงิน" ? "selected" : "" ?>>-- การเงิน --</option>
            <option value="จัดการ" <?php echo isset($employeeById) && $employeeById['department'] == "จัดการ" ? "selected" : "" ?>>-- จัดการ --</option>
            <option value="UI/UX" <?php echo isset($employeeById) && $employeeById['department'] == "UI/UX" ? "selected" : "" ?>>-- UI/UX --</option>
            <option value="Backend" <?php echo isset($employeeById) && $employeeById['department'] == "Backend" ? "selected" : "" ?>>-- Backend --</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">ตำแหน่ง</label>
        <input class="form-control" type="text" name="position" id="position" value="<?php echo isset($employeeById['position']) ? $employeeById['position'] : "" ?>" placeholder="หัวหน้าบัญชี" required>
    </div>
    <div class="mb-3">
        <label for="year_joined" class="form-label">ปีที่ทำงาน</label>
        <input class="form-control" type="text" name="year_joined" id="year_joined" value="<?php echo isset($employeeById['year_joined']) ? $employeeById['year_joined'] : "" ?>" placeholder="1,2,3" required>
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">เงินเดือน</label>
        <input class="form-control" type="number" name="salary" id="salary" value="<?php echo isset($employeeById['salary']) ? $employeeById['salary'] : "" ?>" placeholder="30000" required>
    </div>
    <button class="w-100 btn btn-success" type="submit">ยืนยัน</button>
</form>