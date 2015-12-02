<!--
get_posts() 함수를 이용하여, post를 호출(쿼리) 합니다.
그러나, author 정보가 관리자정보로 들어갑니다.
-->



<?php wp_reset_postdata(); ?>

<?php
   $args1 = array(
	'post_type' => array( 'course' ),
	'name' => 'kenneth의-눈높이-어린이-영어',
	'posts_per_page' => 1
	);
   $course_query1 = get_posts( $args1 );

   $args2 = array(
	'post_type' => array( 'course' ),
	'name' => '스베타선생님의-기초튼튼-어린이-영어-2',
	'posts_per_page' => 1
	);
   $course_query2 = get_posts( $args2 );

   $args3 = array(
	'post_type' => array( 'course' ),
	'name' => '지부사-선생님의-전략적-비즈니스-영어',
	'posts_per_page' => 1
	);
   $course_query3 = get_posts( $args3 );


   $course_query4 = array_merge( $course_query1, $course_query2, $course_query3);
?>

<div class="section items">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 archive-header">
				<h2 class="section-title"><?php _e('이번주 추천 강좌', 'lms-press'); ?></h2>
			</div>
		</div>
<div class="row">
<?php


foreach( $course_query4 as $post) {

	get_template_part('templates/content', 'item');
}
?>






<!--
그래서 , 아래와 같이 수정하였습니다. author 정보도 잘 표시됩니다.
-->



<?php wp_reset_postdata(); ?>




<?php
$ids = array(1971,1715,1746);
$info = array( 'post__in' => $ids,'post_type'=> 'course' );
$my_query = new WP_Query($info);


?>

<div class="section items">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 archive-header">
				<h2 class="section-title"><?php _e('이번주 추천 강좌', 'lms-press'); ?></h2>
			</div>
		</div>
<div class="row">

<?php
if ( $my_query ->have_posts() ) : while ( $my_query ->have_posts() ) : $my_query ->the_post();
  get_template_part('templates/content', 'item');
endwhile;
endif;
?>
