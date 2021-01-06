<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<title></title>
<link href="/Experiment10/Public/bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet">
<link rel="manifest" href="/Experiment10/Public/bootstrap-4.3.1-dist/js/manifest.json">
<style type="text/css">
    html{
      overflow-y:hidden; 
      height: 100%;
      width: 100%;
    }
</style>
</head>

<body>
 
<main role="main">
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="col-md-4">
          <div class="card mb-4 shadow-sm">
              <img src="/Experiment10/Source/Experiment/<?php echo ($data['outcome_model']); ?>" >

            <div class="card-body">
              <p style="font-size: 20px;"><?php echo ($data['ename']); ?></p>
              <p class="card-text"><?php echo ($data['goal']); ?></p>
              <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">n人在用</small>
                <div class="btn-group">
                  <?php if($data['is_Join'] == 1 ): ?><button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='<?php echo U('Experiment/joinExperiment');?>/experimentId/<?php echo ($data['eid']); ?>'">进入主机</button>
                      <?php else: ?>
                      <button type="button" class="btn btn-sm btn-outline-secondary" > <a href="<?php echo U('Experiment/judgeExperimentType');?>/experimentId/<?php echo ($data['eid']); ?>"   target="_blank">加入我的主机</a> </button><?php endif; ?>
                  
                  
                </div>
                
              </div>
            </div>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--分界线-->
      </div>
    </div>
  </div>

</main>
  
</body>


</html>
<script type="text/javascript">
  parent.document.all.iframeTest.height = Screen.Height;
</script>