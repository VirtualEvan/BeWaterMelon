<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PplUser[]|\Cake\Collection\CollectionInterface $pplUsers
 */
 $currentuser = $this->request->session()->read('Auth.User');
?>
<div class="card  card-home part">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <?= $this->Html->image('home/0.jpg', ['class' => 'd-block img-fluid', 'alt' => 'First slide']); ?>
        </div>
        <div class="carousel-item">
          <?= $this->Html->image('home/1.jpg', ['class' => 'd-block img-fluid', 'alt' => 'Second slide']); ?>
        </div>
        <div class="carousel-item">
          <?= $this->Html->image('home/2.jpg', ['class' => 'd-block img-fluid', 'alt' => 'Third slide']); ?>
        </div>
      </div>
    </div>

    <div class="card-block home">
        <h4> <?= __('Group History') ?> </h4>
        <hr/>

        <canvas id="myChart" width="400" height="400"></canvas>

    </div>
</div>

<?= $this->Html->script('Chart.bundle.min.js') ?>
<script>
var projects = new Array();
var durations = new Array();

<?php foreach ($resProjects as $resProject): ?>
projects.push('<?php echo $resProject->name; ?>');
durations.push(Math.abs(eval('<?php echo $resProject->scheduling; ?>')));
<?php endforeach; ?>

Chart.defaults.global.legend.display = false;
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: projects,
        datasets: [{
            data: durations,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    maintainAspectRatio: true,
                },
                barPercentage: 0.5,
                categoryPercentage: 0.5,
            }],
            xAxes: [{
                  ticks: {
                    stepSize: 1,
                    }
            }],
        }
    }
});
</script>
