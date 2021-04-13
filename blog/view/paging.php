<!-- Paging -->
<nav>
    <ul class="paging">
        <!-- Deactivate the previous page if you are on the 1st page -->
        <li class="page-item <?php echo ($current_page == 1) ? "disabled" : ""; ?>">
            <a class="link-paging" href="?page=<?php echo $current_page-1; ?>" class="link">
                Page précédente
            </a>
        </li>
        <!-- Links to pages -->
        <?php for($page = 1; $page <= $pages; $page++) : ?>
            <li class="page-item <?php echo ($current_page == $page) ? "active" : ""; ?>">
                <a class="link-paging" href="?page=<?php echo $page ?>" class="page-link">
                    <?php echo $page ?>
                </a>
            </li>
        <?php endfor ?>
        <!-- Link to the next page disabled if you are on the last page  -->
        <li class="page-item <?php echo ($current_page == $pages) ? "disabled" : "" ?>">
            <a class="link-paging" href="?page=<?php echo $current_page+1 ?>" class="page-link">
                Page suivante
            </a>
        </li>
    </ul>
</nav>