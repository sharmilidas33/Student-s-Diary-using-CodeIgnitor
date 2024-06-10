<?= $this->extend("\Modules\Student\Views\app") ?>

<?= $this->section("title") ?>
Add Student Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<style>
    #frm-add-student label.error{
        color: red;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    Create Student
    <a href="<?= base_url('student')?>"style="margin-top: -6px;" class="btn btn-warning pull-right">List Student info</a>
  </div>
  <div class="panel-body">
  <form class="form-horizontal" id="frm-add-student" action="<?= base_url('student/add-student') ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="profile_image">Profile Image:</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="profile_image" name="profile_image">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </div>
  </div>
</form>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(function(){
        $('#frm-add-student').validate();
    });
</script>
<?= $this->endSection() ?>


