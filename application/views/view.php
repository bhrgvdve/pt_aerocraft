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

            <div class="col-md-12">


                <table class="table table-bordered">




                    <tbody>
                        <tr>
                            <td>
                                <h2>Title: <?php echo $event['event_title']; ?></h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Start Date: <?php echo date("d-m-Y", strtotime($event['start_date'])); ?></h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>End Date: <?php echo date("d-m-Y", strtotime($event['end_date'])); ?></h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    Recurrance:
                                    <?php echo $this->config->item('arEventRecurrence')[$event['event_recurrence']]; ?>
                                </h5>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <h5>Is Repeat?: <?php echo ($event['repeat_on'] == 1) ?  "Yes" : " No"; ?></h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>Recurrence Repeat on: <?php echo get_week_days(explode(",", $event['recurrence_format'])); ?></h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>Created At: <?php echo date("d-m-Y H:i:s", strtotime($event['created_at'])); ?></h5>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>Dates of occurance:</h5>

                                <ul class="list-group">
                                    <?php if (count($recurrence) > 0) : ?>
                                        <?php foreach ($recurrence as $r) : ?>
                                            <li class="list-group-item"><?php echo date("d-m-Y", strtotime($r)); ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </td>
                        </tr>






                    </tbody>
                </table>


            </div>



        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</body>

</html>