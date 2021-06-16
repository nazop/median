<?php
    /* ３つの整数値を入力させ、3つの値のうち2番目に大きい値を表示する
     * 入力
     * 23 24 25
     * 出力
     * 24
     * とりあえず3つじゃなくても機能するように、だが奇数でないとこの問題は成立しない……
     */

    // 入力を取ってくる
    $input = fgets(STDIN);

    // 配列として分割
    $inputArray = explode(" ", $input);
    
    // 一番最初の入力を基準として、そこから上か下か計算して並び替える
    $outputArray[0] = $inputArray[0];

    // 並び替え
    // もう既に1個目は済んでいるので2個目から見ていく
    // このiは入力の何個目を見ているかを示す
    for($i = 1; $i < count($inputArray); $i++) {  

        // 入れる場所が見つかったかのフラグ
        $pushFlag = false;
        // 今回入れる奴
        $current = $inputArray[$i];
        
        // 出力用配列を見て行って、今回の値より低くなった時点でその手前に突っ込む
        // jは出力用配列の何個目か
        for($j = 0; $j < count($outputArray); $j++) {

            // 比べる相手
            $comparison = $outputArray[$j];

            // もし今回の値未満になっていたら
            if($current <= $comparison) {

                // 比べている配列の手前に今回の値を突っ込む
                array_splice($outputArray, $j, 0, $current);
                // 突っ込んだよフラグを立てる
                $pushFlag = true;
                // 突っ込んだので比べる行為を終了する
                break;
            }            
        }

        // もし今回入れる値より高い数値が発見出来ていなかったら
        if(!$pushFlag){

            // 出力用配列の末尾に今回の値を追加する
            array_push($outputArray, $current);
        }
    }

    // 真ん中ってどの数字?
    $center = floor(count($outputArray) / 2);

    // これが答え
    echo $outputArray[$center];

?>