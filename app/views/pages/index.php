<?php require APPROOT . '/views/inc/header.php'; ?>
<script>
    function increment(id) {
        var xmlhttp = new XMLHttpRequest();
        var x = parseInt(document.getElementById("q-"+id).innerText);
        var q = document.getElementById('q-'+id).innerHTML = ++x;
        document.getElementById('decrement-'+id).disabled = false;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "pages/quantity?q=" + q +'&id='+ id, true);
        xmlhttp.send();

    }

    function decrement(id) {
        var xmlhttp = new XMLHttpRequest();
        var x = parseInt(document.getElementById("q-"+id).innerText);
        if (x == 1){
            document.getElementById('decrement-'+id).disabled = true;
        }
        var q = document.getElementById('q-'+id).innerHTML = --x;
        document.getElementById('decrement-'+id).disabled = false;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "pages/quantity?q=" + q +'&id='+ id, true);
        xmlhttp.send();
    }

</script>
<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="  row d-flex justify-content-between">
                    <div class="col-sm-5">
                        <h2 class="text-center">Warehouse <b>Tools</b></h2>
                    </div>
                    <?php if (isset($_SESSION['user'])) {

                        echo "
                            <div class=\"col-sm-5 d-flex align-items-center justify-content-around\" > <div>". $_SESSION['user']."</div>
                            <form action = \"/pages/logout\"  > <button class='btn btn-primary'>Log Out </button></form >
                            </div >
                    ";
                    }
                    ?>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tool</th>
                    <th>Date Created</th>
                    <th>Category</th>
                    <th>Use</th>
                    <th>Available</th>
                    <th>Put Back</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['tools'] as $tools) :?>

                <tr>
                    <td ><?=$tools->id; ?></td>
                    <td class="text-info"> <?=$tools->name; ?></td>
                    <td><?=$tools->created_at; ?></td>
                    <td><?=$tools->category_name; ?></td>
                    <td>
                        <button id="decrement-<?=$tools->id; ?>" class="button btn btn-danger" onclick="decrement(<?=$tools->id; ?>)">-</button>
                    </td>
                    <td>
                        <span id="q-<?=$tools->id; ?>" class="status text-primary"><?=$tools->available; ?></span>
                    </td>
                    <td>
                        <button id="increment-<?=$tools->id; ?>" class="button btn btn-success" onclick="increment(<?=$tools->id; ?>)">+</button>
                    </td>
                </tr>
<!--                <tr>-->
<!--                    <td>2</td>-->
<!--                    <td>Paula Wilson</td>-->
<!--                    <td>05/08/2014</td>-->
<!--                    <td>Publisher</td>-->
<!--                    <td><span class="status text-success">&bull;</span> 55</td>-->
<!---->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>3</td>-->
<!--                    <td> Antonio Moreno</td>-->
<!--                    <td>11/05/2015</td>-->
<!--                    <td>Publisher</td>-->
<!--                    <td><span class="status text-danger">&bull;</span> 55</td>-->
<!---->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>4</td>-->
<!--                    <td> Mary Saveley</td>-->
<!--                    <td>06/09/2016</td>-->
<!--                    <td>Reviewer</td>-->
<!--                    <td><span class="status text-success">&bull;</span> 55</td>-->
<!---->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>5</td>-->
<!--                    <td> Martin Sommer</td>-->
<!--                    <td>12/08/2017</td>-->
<!--                    <td>Moderator</td>-->
<!--                    <td><span class="status text-success">&bull;</span> 55</td>-->
<!---->
<!--                </tr>-->
            <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
