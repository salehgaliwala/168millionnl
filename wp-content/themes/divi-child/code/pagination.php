<?php

function linksGenerator( Illuminate\Contracts\Pagination\LengthAwarePaginator $orders, $path) {

	$pagination = pagination( $orders->currentPage(), $orders->lastPage() );

	?>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">

			<?php if ( $orders->previousPageUrl() != null ): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $path. getReplacedPageUrl( $orders->currentPage() - 1 ); ?>" aria-label="Prev">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Prev</span>
                    </a>
                </li>
			<?php endif; ?>

			<?php foreach ( $pagination as $page ) : ?>
                <li class="page-item <?php echo $_GET['pageno'] == $page ? 'active' : ''; ?> <?php if ( $page == '1' ) {
					echo $_GET['pageno'] == '' ? 'active' : '';
				} ?>">
                    <a class="page-link <?php if ( $page == '...' ) {
						echo 'preventDefault';
					} ?>" href="<?php echo $path . getReplacedPageUrl( $page ); ?>"><?php echo $page; ?></a>
                </li>
			<?php endforeach; ?>

			<?php if ( $orders->nextPageUrl() != null ): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $path . getReplacedPageUrl( $orders->currentPage() + 1 ); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
			<?php endif; ?>
        </ul>
    </nav>

	<?php
}


function pagination( $c, $m ) {

	$current       = $c;
	$last          = $m;
	$delta         = 3;
	$left          = $current - $delta;
	$right         = $current + $delta + 1;
	$range         = [];
	$rangeWithDots = [];
	$l             = 0;

	for ( $i = 1; $i <= $last; $i ++ ) {
		if ( $i == 1 || $i == $last || $i >= $left && $i < $right ) {
			array_push( $range, $i );
		}
	}

	foreach ( $range as $i ) {
		if ( $l ) {
			if ( $i - $l === 2 ) {
				array_push( $rangeWithDots, $l + 1 );
			} else if ( $i - $l !== 1 ) {
				array_push( $rangeWithDots, '...' );
			}
		}
		array_push( $rangeWithDots, $i );
		$l = $i;
	}

	return $rangeWithDots;
}


function getReplacedPageUrl( $page ) {

	$all_query           = $_GET;
	$all_query['pageno'] = $page;

	return http_build_query( $all_query );
}

function getReplacedSortUrl( $sort ) {

	$all_query            = $_GET;
	$all_query['sort_by'] = $sort;

	return http_build_query( $all_query );
}
