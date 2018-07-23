<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
// echo '<pre>';
// print_r($node);
// exit;
global $base_url;
$url = $base_url . '/' . path_to_theme();
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/person-tabs.css">
<div class="person_left_col"><div class="person-menu-block"><?php
$block = module_invoke('menu_block', 'block_view', '4');
?>
<h4 class="pane-title"><?php print render($block['subject']);?></h4>
<?php print render($block['content']);?></div>
</div>
<div class="person_right_col">
    <div class="panel-pane pane-page-breadcrumb person-breadcrumbs">
      <div class="pane-content">
       <nav class="breadcrumb">
        <a href="/">Home</a> »
        <a href="/about/about-cbiit">About</a> »
        <a href="/about/federal-staff-directory">Federal Staff Directory</a> »
        <?php echo $node->title;?>
        </nav>
       </div>
      </div>

    <div class="node-person">
        <div class="col span_1_of_4">
            <?php
            if(isset($node->field_person_photo['und']['0']['uri'])) {
                $image = $node->field_person_photo['und']['0']['uri'];
            ?>
            <div class="person-photo">
                <img alt="<?php print $node->field_person_photo['und'][0]['alt']; ?>" title="<?php print $node->field_person_photo['und'][0]['title']; ?>" class="img-responsive bio-image" src="<?php print image_style_url(bio_image, $image);?>" style="height:auto; width:100%" />
            </div>
            <?php } ?>
        </div>
        <div class="col person-bio span_3_of_4">
            <?php print render($title_prefix); ?>
                <h1><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
            <?php
            if(isset($node->field_person_professional_title['und']['0']['value'])) { ?>
                <div class="professional-title">
                    <p><b><?php print $node->field_person_professional_title['und']['0']['value']; ?></b></p>
                </div>
            <?php } ?>
            <?php
            if(isset($node->field_person_organization['und'][0]['entity']->name)) { ?>
                <div class="person-org">
                    <p><b><?php print $node->field_person_organization['und'][0]['entity']->name; ?></b></p>
                </div>
            <?php } ?>
            <?php
            if(isset($node->field_person_email['und'][0]['email'])) { ?>
                <div class="person-email">
                    <div class="col"><p>Email:</p></div>
                    <p><a href="mailto:<?php print $node->field_person_email['und'][0]['email']; ?>">  <?php print $node->field_person_email['und'][0]['email']; ?></a></p>
                </div>
            <?php } ?>
            <?php
            if(isset($node->field_person_phone['und'][0]['value'])) { ?>
                <div class="person-phone">
                    <div class="col"><p>Phone:</p></div>
                    <?php if(isset($node->field_person_phone_ext['und'][0]['value'])) { ?>
                        <p><a href="tel:<?php print $content['field_person_phone']['0']['#markup']; ?>"><?php print $content['field_person_phone']['0']['#markup']; ?></a><?php print ', EXT. '. $node->field_person_phone_ext['und'][0]['value']?></p>
                    <?php } else { ?>
                        <p><a href="tel:<?php print $content['field_person_phone']['0']['#markup']; ?>"><?php print $content['field_person_phone']['0']['#markup']; ?></a></p>
                    <?php } ?>
                </div>
            <?php } ?>
            <ul class="person-social">
                <?php
                if(isset($node->field_person_twitter['und'][0]['url'])) {
                    $twitter_url = $node->field_person_twitter['und'][0]['url']; ?>
                        <li><a href="<?php print $twitter_url ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php
                if(isset($node->field_person_linkedin['und'][0]['url'])) {
                    $linkedin_url = $node->field_person_linkedin['und'][0]['url']; ?>
                        <li><a href="<?php print $linkedin_url ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="responsiveTabs" class="col span_4_of_4">
            <ul class="pates-tabs__list">
                <?php
                    $body = $node->body['en'][0]['value'];
                    $projects = $node->field_person_projects['und'][0]['entity']->name;
                    $publications = $node->field_person_publications['und'][0]['value'];
                ?>
                <?php
                    if($body && (isset($projects) || isset($publications))) { ?>
                    <li class="pates-tabs__item"><a class="pates-tabs__link" id="label_short_bio" href="#person-bio">Short Bio</a></li>
                <?php } elseif ($body && !(isset($projects) && isset($publications))) {?>
                    <h2>Short Bio</h2>
                <?php } ?>
                <?php
                    if(isset($projects) && ($body || isset($publications))) { ?>
                    <li class="pates-tabs__item"><a href="#person-projects" id="label_projects" class="pates-tabs__link">Projects</a></li>
                <?php } elseif (isset($projects) && !($body && isset($publications))) {?>
                    <h2>Projects</h2>
                <?php } ?>
                <?php
                    if(isset($publications) && (isset($projects) || $body)) { ?>
                    <li class="pates-tabs__item"><a href="#person-publications" id="label_publications" class="pates-tabs__link">Publications</a></li>
                <?php }  elseif (isset($publications) && !(isset($projects) && $body)) {?>
                    <h2>Publications</h2>
                <?php } ?>
            </ul>
            <?php
            if($body && (isset($projects) || isset($publications))) { ?>
                <div id="person-bio" class="pates-tabs__tabcontent">
                    <?php print $node->body['en'][0]['value'] ?>
                </div>
            <?php } elseif ($body && !(isset($projects) && isset($publications))) { ?>
                <div class="person-bio">
                    <p><?php print $node->body['en'][0]['value'] ?></p>
                </div>
            <?php } ?>
            <?php
            if(isset($projects) && ($body || isset($publications))) { ?>
                <div id="person-projects" class="pates-tabs__tabcontent">
                    <p>Projects you run or work on at CBIIT</p>
                    <ul class="person-projects">
                    <?php
                        foreach ($node->field_person_projects['und'] as $per_proj) {
                            $project_url = $per_proj['entity']->field_project_url['und']['0']['url'];
                            if(isset($project_url)) { ?>
                            <li><a href="<?php echo($project_url); ?>"><?php echo $per_proj['entity']->name ?></a></li>
                        <?php } else { ?>
                            <li><p><?php echo $per_proj['entity']->name ?></p></li>
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </div>
            <?php } elseif (isset($projects) && !($body && isset($publications))) { ?>
                <div>
                    <p>Projects you run or work on at CBIIT</p>
                    <ul class="person-projects">
                    <?php
                        foreach ($node->field_person_projects['und'] as $per_proj) {
                            $project_url = $per_proj['entity']->field_project_url['und']['0']['url'];
                            if(isset($project_url)) { ?>
                            <li><a href="<?php echo($project_url); ?>"><?php echo $per_proj['entity']->name ?></a></li>
                        <?php } else { ?>
                            <li><p><?php echo $per_proj['entity']->name ?></p></li>
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <?php
            if(isset($publications) && (isset($projects) || $body)) { ?>
            <div id="person-publications" class="pates-tabs__tabcontent">
                <?php print $node->field_person_publications['und'][0]['value'] ?>
            </div>
            <?php } elseif (isset($publications) && !(isset($projects) && $body)) { ?>
                <div class="person-publications">
                    <p><?php print $node->field_person_publications['und'][0]['value'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
