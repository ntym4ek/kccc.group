<?php
?>

<div class="share">
  <div class="share-btn"><a href="javascript:void(0);" title="<?php print t('Share link'); ?>"><i class="icon icon-13"></i></a></div>
  <div class="share-links">
    <a class="share-arrow"><i class="icon icon-01"></i></a>
    <a class="vk" href="https://vk.com/share.php?url=<?php print urlencode($url); ?>" rel="nofollow" target="_blank" title="вконтакте"><i class="icon icon-14"></i></a>
    <a class="tg" href="https://t.me/share/url?url=<?php print urlencode($url); ?>&text=<?php print urlencode($title); ?>" rel="nofollow" target="_blank" title="telegram"><i class="icon icon-15"></i></a>
    <a class="ok" href="https://connect.ok.ru/offer?url=<?php print urlencode($url); ?>&title=<?php print urlencode($title); ?>" rel="nofollow" target="_blank" title="одноклассники"><i class="icon icon-16"></i></a>
    <a class="em" href="mailto:?to=&subject=<?php print urlencode($title); ?>&body=<?php print urlencode($text); ?>:%0D<?php print urlencode($url); ?>%0D%0D" target="_blank" title="email"><i class="icon icon-18"></i></a>
  </div>
</div>

