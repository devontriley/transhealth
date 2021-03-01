<?php
$name = get_the_title();
$link = get_the_permalink();
$id = get_the_ID();
$photo = get_field('staff_photo');
$pronouns = get_field('pronouns');
$title = get_field('title');
$hobbies = get_field('hobbies');
$pets = get_field('pets');
$band = get_field('favorite_band');
$bio = get_field('bio');

$joinedDate = get_field('joined_transhealth');
$education = get_field('education');
$languages = get_field('languages');

$isClinician = is_singular('clinicians');

//IF POST TYPE IS CLINICIAN 
if($isClinician)
{
    $specialty = get_field('speciality_of_practice');
    $internship = get_field('internship');
    $boardCert = get_field('board_certification');
    $residency = get_field('residency');
}

?>

<main id="content" class="staff-single">
    <div class="module-wrapper module-padded">
        <div class="row">

            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="primary-details">
                    <?php echo imageTag($photo, '', '', '', false)?>
                    
                    <p class="name"><?php echo $name ?></p>
                    <p class="title"><?php echo $title ?></p>
                    <p class="pronouns"><?php echo $pronouns ?></p>
                    
                    <?php if($isClinician): ?>
                        <?php echo button('', 'Book an Appointment'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-1">
                <div class="secondary-details">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="background-tab" data-toggle="tab" href="#background" role="tab" aria-controls="background" aria-selected="true">
                                Background
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="interests-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="interests" aria-selected="false">
                                Interests
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="background" role="tabpanel" aria-labelledby="background-tab">
                            <?php if($isClinician): ?>
                                <h4>Speciality of Practice</h4>
                                <p><?php echo $specialty ?></p>

                                <h4>Joined Transhealth</h4>
                                <p><?php echo $joinedDate ?></p>

                                <h4>Internship</h4>
                                <p><?php echo $internship ?></p>

                                <h4>Board Certification</h4>
                                <p><?php echo $certifications ?></p>

                                <h4>Languages</h4>
                                <p><?php echo $languages ?></p>

                                <h4>Education</h4>
                                <p><?php echo $education ?></p>

                                <h4>Residency</h4>
                                <p><?php echo $residency ?></p>
                            <?php else: ?>  
                                <h4>Joined Transhealth</h4>
                                <p><?php echo $joinedDate ?></p>

                                <h4>Education</h4>
                                <p><?php echo $education ?></p>

                                <h4>Languages</h4>
                                <p><?php echo $languages ?></p>

                                <h4>Certification</h4>
                                <p><?php echo $certifications ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="tab-pane fade" id="interests" role="tabpanel" aria-labelledby="interests-tab">
                                <h4>Hobbies</h4>
                                <p><?php echo $hobbies ?></p>

                                <h4>Pets</h4>
                                <p><?php echo $pets ?></p>

                                <h4>Favorite Artist/Band</h4>
                                <p><?php echo $band ?></p>
                        </div>
                    </div>

                    <h2>Staff Bio</h2>

                    <div class="content">
                        <?php echo $bio ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>