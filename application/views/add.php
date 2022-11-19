<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">




</head>

<body>


    <div class="container">

        <div class="row mb-3 pt-3">

            <div class="col-md-12 text-right">
                <a href="<?php echo site_url('events/index'); ?>" class="btn btn-secondary">
                    < Back to list</a>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                if ($this->session->flashdata('flash_message')) {
                    $flash_message = $this->session->flashdata('flash_message');
                ?>
                    <div class="alert alert-<?php echo $flash_message['class']; ?>">
                        <button class="close" data-dismiss="alert" type="button">×</button>
                        <?php echo $flash_message['flash_message']; ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <form method="post" id="eForm" action="<?php echo site_url('events/save'); ?>" novalidate>
                    <div class="form-group row">
                        <label for="eTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="eTitle" name="eTitle">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="eStartDate" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="eStartDate" name="eStartDate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="eEndDate" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="eEndDate" name="eEndDate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="eRecurrance" class="col-sm-2 col-form-label">Recurrance</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="eRecurrance" name="eRecurrance">
                                <?php foreach ($this->config->item('arEventRecurrence') as $k => $er) : ?>
                                    <option value="<?php echo $k; ?>"><?php echo $er; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="eIsRepeat" class="col-sm-2 col-form-label">Is Repeat</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="eIsRepeat" name="eIsRepeat">>

                                <option value="0">No</option>
                                <option value="1">Yes</option>

                            </select>

                        </div>
                    </div>


                    <div class="form-group row _rowDayOfWeek my_item" style="display:none;">
                        <label for="eIsRepeat" class="col-sm-2 col-form-label">Day of Weeks</label>
                        <div class="col-sm-10">
                            <?php foreach ($this->config->item('arWeekDays') as $k => $er) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $k; ?>" id="eDayofWeeks" name="eDayofWeeks[]">
                                    <label class="form-check-label" for="defaultCheck1">
                                        <?php echo $er; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="form-group row _rowSelectCount" style="display:none;">
                        <label for="eIsRepeat" class="col-sm-2 col-form-label">Occurance</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="eOccurance" name="eOccurance">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>



        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("form#eForm").validate({
                ignore: ":hidden:not(.my_item)",
                rules: {
                    eTitle: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    eStartDate: {
                        required: true
                    },
                    eEndDate: {
                        required: true
                    },

                    "eDayofWeeks[]": {
                        required: true
                    },
                }


            });
            $("select#eIsRepeat").change(function() {
                showHideOccurance();
            });

            $("select#eRecurrance").change(function() {
                showHideOccurance();
            });


            function showHideOccurance() {
                var isRepeat = $("select#eIsRepeat").val();
                var eRecurance = $("select#eRecurrance").val();
                //alert($("select#eRecurrance").val());
                if (isRepeat == 1 && eRecurance != 'D') {
                    if (eRecurance == 'W') {
                        $('._rowDayOfWeek').show();
                        $('._rowSelectCount').hide();
                    } else {
                        $('._rowSelectCount').show();
                        $('._rowDayOfWeek').hide();
                    }
                } else {
                    $('._rowSelectCount').hide();
                    $('._rowDayOfWeek').hide();
                }

            }
        });
    </script>
</body>

</html>