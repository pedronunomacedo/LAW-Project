<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageFAQs</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All FAQs...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Question</th>
                <th scope="col" style="text-align: center">Answer</th>
                <th colspan=2 style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            <tr id="addNewProductForm">
                <th colspan=8 style="text-align: center;">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div id="rowAddFAQ">
                                    <div>
                                        <label for="prodDescription">Question: </label>
                                        <textarea id="newQuestionID" name="newQuestion" rows="4" cols="50"></textarea>
                                    </div>
                                    <div>
                                        <label for="prodDescription">Answer: </label>
                                        <textarea id="newAnswerID" name="newAnswer" rows="4" cols="50"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit" style="margin-top: 15px">
                                        <div class="form-group">
                                            <a onClick="addFAQ()" type="submit" class="btn btn-success" value="Create FAQ">Create FAQ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            <?php $__currentLoopData = $allFAQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr name="faq_row" style="text-align: center; justify-content: center;" id="faqForm<?php echo e($faq->id); ?>">
                    <th scope="row" style="text-align: center; justify-content: center;"><?php echo e($faq->id); ?></th>
                    <td style="text-align: center; justify-content: center;"><input name="faq_question" style="all: unset;" value="<?php echo e($faq->question); ?>" id="faq_question<?php echo e($faq->id); ?>"></td>
                    <td style="text-align: center; justify-content: center;"><input name="faq_answer" style="all: unset" value="<?php echo e($faq->answer); ?>" id="faq_answer<?php echo e($faq->id); ?>"></input></td>
                    <td>
                        <a class="btn" onClick="deleteFAQ(<?php echo e($faq->id); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" color="blue">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a class="btn" onClick="updateFAQ(<?php echo e($faq->id); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/pedroLBAW/2nd-delivery/lbaw2284/resources/views/pages/adminManageFAQs.blade.php ENDPATH**/ ?>