<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>


<div class="container my-5">
    <h3 class="mb-3">Add Skills</h3>
    <a href="<?= base_url('skills') ?>">
        <button class="btn btn-sm btn-secondary text-light fw-bold mb-2">
            Back
        </button>
    </a>

    <form method="post" action="<?= base_url('skills/create'); ?>">
        <div class="mb-3">
            <label for="user_id" class="form-label">User_name:</label>
            <br>
            <!-- <select name="select_id" id="sel_id">
                <option value="">Select id</option>
            </select> -->
            <?php echo form_dropdown('user_id', $user_options); ?>
        </div>

        <div class="mb-3">
            <label for="Tech_skill">Technical Skill:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="c" name="tech_skill[]" value="C_Programming">
                <label class="form-check-label" for="c">C Programming language</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="c_plus" name="tech_skill[]" value="C_plus">
                <label class="form-check-label" for="c_plus">C++</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="java" name="tech_skill[]" value="java">
                <label class="form-check-label" for="java">Java</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="python" name="tech_skill[]" value="python">
                <label class="form-check-label" for="python">Python</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="html" name="tech_skill[]" value="html">
                <label class="form-check-label" for="html">HTML</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="css" name="tech_skill[]" value="css">
                <label class="form-check-label" for="css">CSS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="js" name="tech_skill[]" value="javascript">
                <label class="form-check-label" for="js">JavaScript</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="Soft_skill">Soft Skill:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="communication" name="soft_skill[]" value="Communication">
                <label class="form-check-label" for="communication">Communication</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="teamwork" name="soft_skill[]" value="teamwork">
                <label class="form-check-label" for="teamwork">Team Work</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="prblmslv" name="soft_skill[]" value="problem_solving">
                <label class="form-check-label" for="prblmslv">Problem Solving</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="lead" name="soft_skill[]" value="leading">
                <label class="form-check-label" for="lead">Leadership</label>
            </div>
        </div>



        <button type="submit" class="btn btn-sm btn-success">Add</button>
    </form>



</div>

<?= $this->endSection(); ?>