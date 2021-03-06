<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3 ">
            <!--            sidebar-->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="col-md-9" style="font-size: 20px">
            <h5 class=" mb-5 md-font" style="text-align: justify; word-spacing: 2px">
                What kind of symptoms are you encountering? check them out here. </h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="fever" name="malaria[]"  class="mr-2 custom-control-input" value="fever">
                        <label for="fever" class="custom-control-label">Fever</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="headache" class="mr-2 custom-control-input" value="headache">
                        <label for="headache" class="custom-control-label">Headache</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="bodyache" name="malaria[]" class="malaria mr-2 custom-control-input" value="bodyache">
                        <label for="bodyache" class="custom-control-label">Body Ache</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="persistence_headache" name="typhoid[]" class="typhoid mr-2 custom-control-input" value="persistence_headache">
                        <label for="persistence_headache" class="custom-control-label">Persistence Headache</label>
                    </div>
                </div>
                <div class="col-md-6" style="font-size: 20px">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="abdominal_discomfort" name="typhoid[]" class="typhoid mr-2 custom-control-input" value="abdominal_discomfort">
                        <label for="abdominal_discomfort" class="custom-control-label">Abdominal Discomfort</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="painful_urination" name="urinary[]" class="urinary mr-2 custom-control-input" value="painful_urination">
                        <label for="painful_urination" class="custom-control-label">Painful Urination</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="urine_urgency" name="urinary[]" class="urinary mr-2 custom-control-input" value="urine_urgency">
                        <label for="urine_urgency" class="custom-control-label">Urine Urgency</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" id="itching" name="urinary[]" class="urinary mr-2 custom-control-input" value="itching">
                        <label for="itching" class="custom-control-label">Itching</label>
                    </div>
                </div>
                <div class="input-group justify-content-center" style="margin: 50px 200px 0px 200px;">
                    <button type="button" id="btnResult" onclick="symptoms()" class="btn btn-outline-primary btn-block">CHECK</button>
                </div>
                <p class="mt-5 mr-5 md1-font" style="text-align: justify">
                    You can't find it here,
                    We have you covered. you can <a href="message.php" class="btn btn-outline-primary btn-sm">click here</a> to message our
                    certified doctor about what you are experiencing and have your response back if it required having an
                    appointment with the Doctor it shall be stated. Thank you.
                </p>
            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>
