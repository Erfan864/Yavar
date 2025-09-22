<div id="comments" class="comments-area mt-8">

    <!-- فقط بخش لیست دیدگاه‌ها + فرم -->
    <div class="space-y-4">
        <?php if ( have_comments() ) : ?>
            <ol class="space-y-4">
                <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 0,
                    'callback'   => function( $comment, $args, $depth ) {
                        ?>
                        <li id="comment-<?php comment_ID(); ?>" class="border rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2 text-sm text-gray-500">
                                <span><?php echo get_comment_author(); ?></span>
                                <span><?php echo get_comment_date('j F Y'); ?></span>
                            </div>
                            <div class="text-gray-800 mb-3">
                                <?php comment_text(); ?>
                            </div>
                        </li>
                        <?php
                    }
                ) );
                ?>
            </ol>
        <?php endif; ?>

        <?php
        // فرم ارسال دیدگاه
        comment_form( array(
            'title_reply'        => 'ارسال دیدگاه',
            'logged_in_as'       => '', // متن "به عنوان X وارد شده‌اید..." رو حذف می‌کنه
            'comment_notes_before' => '', // متن بالای فرم (بخش‌های موردنیاز...) رو حذف می‌کنه
            'comment_notes_after'  => '', // متن زیر فرم رو حذف می‌کنه
            'class_submit'       => 'border-2 border-[#ffb800] hover:border-[#c7853b] text-black px-4 py-2 rounded-lg font-medium',
            'comment_field'      => '<textarea id="comment" name="comment" class="w-full border rounded-lg p-3 mb-4" rows="4" required placeholder="نظر خود را بنویسید..."></textarea>',
        ) );
        ?>
    </div>
</div>
