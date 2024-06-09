<?= $this->extend("\Modules\Student\Views\app") ?>

<?= $this->section("title") ?>
List Student Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="panel panel-primary">
  <div class="panel-heading">List of Students
    <a href="<?= base_url('add-student')?>" class="btn btn-warning">Add Student info</a>
  </div>
  <div class="panel-body">
    <table class="table" id="tbl-student-list">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Profile Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            if(count($students)>0){
                foreach($students as $student){
        ?>
             <tr>
                <td><?=$student["id"]?></td>
                <td><?=$student["name"]?></td>
                <td><?=$student["email"]?></td>
                <td><?=$student["phone_number"]?></td>
                <td>
                    <?php
                    if(isset($student['profile_image']) && !empty($student['profile_image'])){
                        ?>
                            <img src=<?=$student["profile_image"]?> alt="Profile Image" width="50">
                        <?php
                    } else{
                        echo "No Profile Image";
                    }
                    ?>
                </td>
                <td>
                    <a href="<?= base_url('edit-student/'.$student['id']) ?>" class="btn btn-info">Edit</a>
                    <a href="<?= base_url('delete-student/'.$student['id']) ?>" class="btn btn-danger">Remove</a>
                </td>
            </tr>       
        <?php
                }
            }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        $('#tbl-student-list').DataTable();
    });
</script>
<?= $this->endSection() ?>
