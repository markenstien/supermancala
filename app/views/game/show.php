<?php build('content') ?>
<div id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><?php  echo $game['title']?>s</strong></h2>
                    <p><?php  echo $game['description']?> </p>
                </div>
            </div>
        </div>

        <a href="<?php echo _route('game:play', [
            'code' => $game['code'],
            'id' => $game['id'],
        ])?>" class="btn btn-danger btn-lg">PLAY</a>
    </div>
</div>
<?php endbuild() ?>

<?php loadTo('tmp/landing')?>