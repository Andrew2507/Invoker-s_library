<?php $image = "" ?>
<!DOCTYPE html>
<html lang="ru">
<div class="info" style="grid-template-columns: 80% 100%;">
    <div class="main">
        <div class="title">Аспекты</div>
        <?php foreach($hero['facets'] as $id => $facet): ?>
            <div class="facets-section">
                <div class="facet-header">
                    <div class="facet-image" style="background-image: url(<?= $facet['icon'] ?>)"></div>
                    <div class="facet-name"><?=$facet['name']?></div>
                </div>
                <h3>Описание</h3>
                <div class="facet-text"><?=$facet['description']?></div>
                <?php if(sizeof($facet['abilities']) > 0): ?>
                    <h3>Улучашемые способности</h3>
                    <div class="facet-stats-block">
                        <?php if($facet['abilities']): ?>
                            <?php foreach($facet['abilities'] as $param): ?>
                                <?php foreach ($hero['abilities'] as $ability): ?>
                                    <?php if ($ability['name'] == $param['name']): ?>
                                        <?php $image = $ability['img'] ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="facet-ability-header">
                                    <div class="facet-ability-image" style="background-image: url(<?= $image ?>)"></div>
                                    <div class="facet-ability-name"><?= $param['name'] ?></div>
                                </div>
                                <?php if(strlen($param['description']) > 0): ?>
                                    <div class="facet-ability-description"><?= $param['description'] ?></div>
                                <?php endif; ?>
                                <?php if (strlen($param['stats'][0]) > 0): ?>
                                    <?php foreach($param['stats'] as $stat): ?>
                                        <div class="facet-ability-stats"><?= str_replace(" =>", ":", $stat) ?></div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</html>