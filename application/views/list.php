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
                <a href="<?php echo site_url('events/add'); ?>" class="btn btn-secondary">
                    + Add New</a>
            </div>
        </div>


        <div class="row">

            <div class="col-md-12">

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Recurrence</th>
                            <th>Repeat on</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($events) > 0) : ?>
                            <?php foreach ($events as $event) : ?>

                                <tr>
                                    <td><?php echo $event['event_title']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($event['start_date'])); ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($event['end_date'])); ?></td>
                                    <td><?php echo $this->config->item('arEventRecurrence')[$event['event_recurrence']]; ?></td>
                                    <td><?php echo ($event['repeat_on'] == 1) ? 'Yes' : 'No'; ?></td>
                                    <td><?php echo date("d-m-Y H:i:s", strtotime($event['created_at'])); ?></td>

                                    <td>

                                        <a href="<?php echo site_url("events/view/" . $event['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url("events/delete/" . $event['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </td>
                                </tr>


                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>


            </div>



        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({

                "order": false
            });
        });
    </script>
</body>

</html>