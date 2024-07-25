<?php build('content') ?>
    <div class="container-fluid">
        <div style="height:50px; ">

        </div>
        <div class="row align-items-top">
            <div class="col-md-2">
                <h3>Instructions</h3>
                <div id="instruction">
                    <p style="font-size: 10pt;"><?php echo $gameData['description']?></p>
                </div>
                <?php echo wDivider()?>
                <section>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td>Last Played</td>
                            <td><?php echo round($gameScoreDetails['lastPlayedScore']->game_score ?? 0)?></td>
                        </tr>
                        <tr>
                            <td>Highest Score</td>
                            <td><?php echo round($gameScoreDetails['highestScore']->game_score ?? 0)?></td>
                        </tr>
                    </table>
                </section>
            </div>
            <div class="col-md-7">
                <div class="text-center">
                    <h1><?php echo $gameData['title']?></h1>
                </div>
                <?php if(isEqual($game, 'mancala')) :?>
                    <h3>Sunka is only available, fullscreen or desktop</h3>
                    <a href="/GameController/playMancala">Play here.</a>
                <?php else :?>
                <iframe src="<?php echo GET_PATH_RESOURCE.DS.'games/'.$game.'/main.php'?>" frameborder="0"
                    style="width: 800px;  height:700px;margin:0px auto; display:block"></iframe>
                <?php endif?>
                <?php echo wDivider() ?>
            </div>
            <div class="col-md-3">
                <h3>Leaderboards</h3>
                <a href="#" onclick="location.reload()" 
                    style="border: 1px solid #000;
                    padding:5px;
                    margin-bottom:15px; display:block;">Click to Update Scores</a>
                <table class="table table-sm table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>Date</td>
                        <td>Played</td>
                        <td>Score</td>
                    </tr>
                    <?php foreach($gameScoreDetails['leaderboards'] as $key => $row) :?>
                        <tr>
                            <td><?php echo $row->fullname?></td>
                            <td><?php echo $row->last_played_dt?></td>
                            <td><?php echo $row->game_count?></td>
                            <td><?php echo round($row->game_score_total)?></td>
                        </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
<?php endbuild()?>

<?php build('style') ?>
<style>
    html, body {margin: 0; height: 100%; overflow: hidden}
</style>
<?php endbuild()?>
<?php loadTo('tmp/landing')?>