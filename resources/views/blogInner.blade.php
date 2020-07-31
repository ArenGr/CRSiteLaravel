<?php
    $date = date_create($data['target_blog']['created_at']);
    $date = date_format($date,"d.m.Y");
    $need_to_split = 200;

    $image_alt = "";
    $image_title = "";

    if(!empty($data['target_blog'])) {
        if((!empty($data['target_blog']['image_alt']))) {
            $image_alt = $data['target_blog']['image_alt'];
        }
        if((!empty($data['target_blog']['image_title']))) {
            $image_title = $data['target_blog']['image_title'];
        }
    }
?>
<style>
    body{
        background: url(/public/images/Top_numbers_full.png) repeat-y, url(/public/images/lines-for-white.png) repeat, #fff;
        background-position: left top;
        background-size: 25px, contain;
    }
    nav ul li a{
        color:#292929;
    }
    .contactUs {
        border-color: #292929;
    }
    .contactUs:hover a{
        color: #fff;
    }
    .contactUs:before{
        background:#292929;
    }
    .fixed_nav_links_color {
        color: #fff;
    }
    .fixed_nav_contact_us {
        border-color: #fff;
    }
    .fixed_nav_contact_us:hover a {
        color: #292929;
    }
    .fixed_nav_contact_us:before {
        background:#fff;
    }
    .blog_date {
        margin-top:50px;
    }
    h3 {
        color: #282828;
        text-transform: uppercase;
        font-weight: 800;
    }
    .inner_blog_container {
        margin-top: 20px;
        padding-right: 70px;
    }
    .inner_blog_container h1, .inner_blog_container h2, .inner_blog_container h3, .inner_blog_container h4,
    .inner_blog_container h5, .inner_blog_container h6 {
        margin-bottom: 0;
    }
    .inner_blog_container p{
        line-height: 22px !important;
        font-size: 16px !important;
        margin: 10px 0 30px 0;
    }
    
    .inner_blog_container span {
        line-height: 22px;
        font-size: 16px;
        margin: 10px 0 30px 0;
    }
    
    .inner_blog_container img {
        width: 100% !important;
    }
    .bloginner_main_image {
        width: 75% !important;
    }
    @media screen and (max-width: 800px) {
        body{
            background: #fff url(/public/images/mobile_grey_lines.png) repeat;
            background-position: left top;
            background-size: contain;
        }
        .inner_blog_container {
            padding-right: 0;
        }
        .bloginner_main_image {
            width: 100% !important;
        }
        .blog_titles:before {
            top: 100% !important;
        }
    }
</style>
<div class="container blog_cont response-blog-inner pdb-10">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 blog_inner_sections padding_left_for_mobile" style="padding-left:84px;">
            <div class="indent white_titles blog_big_title">
                <span class="not_tag">&lt;h1&gt;</span>
                <h1 class='blog_titles'><?= $data['target_blog']['title'] ?></h1>
                <span class="not_tag">&lt;/h1&gt;</span>
            </div>
            <section>
                <div>
                    <p class='blog_date mgt-10 mgb-50'><?= $date ?></p>
                </div>
                <div>
                    <img class="bloginner_main_image" src="/public/uploads/<?= $data['target_blog']['image'] ?>" alt="<?= $image_alt ?>" title="<?= $image_title ?>">
                </div>
                <div class="inner_blog_container" style="font-family: Proxima Nova Alt Regular;">
                    <?php
                        echo $data['target_blog']['content'];
                    ?>
                </div>
            </section>
            <section>
                <div class='blog_img_div'>
                    <div>
                        <h3><?= $data['target_blog']['banner_title'] ?></h3>
                    </div>
                    <div>
                        <p><?= $data['target_blog']['banner_text'] ?></p>
                    </div>
                    <div class="links black_link green_link long_text blog_link full-with-link">
                        <a href="<?= $data['target_blog']['banner_slug'] ?>" class="mobile_links_padding"><?= $data['target_blog']['banner_slug_text'] ?></a>
                    </div>
                    <img src='/public/images/blog/starting-a-blog-in-2017-1024x683.jpg'>
                </div>
                <div>
                    <div class="blog_social_icons blog_twitter">
                        <div>
                            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?url=<?= $page_main_url."/blog/".$data["target_blog"]["slug"]?>','','_blank, width=575, height=400, resizable=yes, scrollbars=yes'); return false;" rel="nofollow">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons">
                        <div>
                            <a href="#" onclick="share_fb('<?= $page_url ?>');return false;" rel="nofollow" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons">
                        <div>
                            <a href="#" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?= $page_main_url."/blog/".$data["target_blog"]["slug"]?>&title=<?=urlencode($data["target_blog"]["title"])?>&summary=<?= urlencode($data["description"])?>&source=<?=$page_url?>','','_blank, width=500, height=500, resizable=yes, scrollbars=yes'); return false;" rel="nofollow">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons">
                        <div>
                            <a href="https://plus.google.com/share?url=<?= $page_main_url."/blog/".$data['target_blog']['slug']?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="nofollow">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            if(!empty($data['related_blogs'])) { ?>
                <section class="pdt-20 pdb-20" style='padding:50px 0;'>
                    <div class="row">
                        <div class='col-lg-12 blog_title_h3'>
                            <h3>Related blog posts</h3>
                        </div>
                        <?php
                            $content = '';
                            $counter = 0;
                            $hidden_class = '';
                            foreach ($data['related_blogs'] as $related_blog) {
                                if($counter == 1) {
                                    $hidden_class = "mobile_no_display";
                                }
                                $date = date_create($related_blog['created_at']);
                                $date = date_format($date,"d.m.Y");

                                $blog_content = strip_tags($related_blog['content']);
                                $blog_content_length = mb_strlen($blog_content);
                                $blog_content = substr($blog_content, 0, $need_to_split)."...";

                                $content .= '<div class="col-lg-6 col-md-6 col-sm-12 home_blogs blog_padding_left '.$hidden_class.'">
                                                  <a href="/blog/'.$related_blog['slug'].'" class="blog_links">
                                                      <div style="background: url(/public/uploads/'.$related_blog['image'].')" class="blogs_images_static hover_scale"></div>
                                                      <div class="blog_title_h3">
                                                          <h3>'.$related_blog['title'].'</h3>
                                                      </div>
                                                      <div>
                                                          <p class="blog_date_small">'.$date.'</p>
                                                      </div>
                                                      <div>
                                                          <p class="home_blogs_text">'.$blog_content.'</p>
                                                      </div>
                                                  </a>
                                                  <div>
                                                      <div class=" blog_social_icons blog_twitter">
                                                          <div>
                                                              <a href="#" onclick="window.open(\'https://twitter.com/intent/tweet?url='.$page_main_url.'/blog/'.$related_blog["slug"].'\', \'\', \'_blank, width=575, height=400, resizable=yes, scrollbars=yes\'); return false;" rel="nofollow">
                                                                  <i class="fa fa-twitter" aria-hidden="true"></i>
                                                              </a>
                                                          </div>
                                                      </div>
                                                      <div class=" blog_social_icons">
                                                          <div>
                                                              <a href="#" onclick="share_fb(\''.$page_main_url.'/blog/'.$related_blog["slug"].'\');return false;" rel="nofollow" target="_blank">
                                                                  <i class="fa fa-facebook" aria-hidden="true"></i>
                                                              </a>
                                                          </div>
                                                      </div>
                                                      <div class=" blog_social_icons">
                                                          <div>
                                                              <a href="#" onclick="window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$page_main_url.'/blog/'.$related_blog["slug"].'&title='.urlencode($related_blog['title']).'&summary='.urlencode($related_blog['page_description']).'&source='.$page_main_url.'/blog/'.$related_blog['slug'].'\', \'\', \'_blank, width=500, height=500, resizable=yes, scrollbars=yes\');return false;" rel="nofollow">
                                                                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                              </a>
                                                          </div>
                                                      </div>
                                                      <div class="blog_social_icons">
                                                            <div>
                                                                <a href="https://plus.google.com/share?url='.$page_main_url.'/blog/'.$related_blog["slug"].'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;"  rel="nofollow">
                                                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                  </div>
                                              </div>';
                                $counter++;
                            }
                            echo $content;
                        ?>
                    </div>
                </section>
            <?php } ?>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 blog_inner_sections blog_inner_sections_margin sm-pd-l-84">
            <div class="col-lg-12 col-md-6 col-sm-6 home_blogs blog_padding_left blog_subscribe">
                <div class='blog_sub_title'>
                    <p style="font-size: 16px;">Subscribe to Newsletters</p>
                </div>
                <div class='blog_sub_form'>
                    <div class='blog_sub_input'>
                        <input id="_token" type="hidden"  value="<?= $_SESSION['_token'] ?>">
                        <input id="sub_email" type="email" class="subscribe_inp" placeholder="E-MAIL">
                    </div>
                    <div class='blog_sub_button' style="position: relative">
                        <input type='button' class='subscribe_but' value='SUBSCRIBE'>
                        <div class="subscribe_load">
                            <div class="subscribe_loader"></div>
                        </div>
                    </div>
                </div>
                <div class="blog_sub_p subscribe_res_message"></div>
                <div class='blog_sub_p'>
                    <p>
                        Keep up with the most trending tech news articles. We promise not to disturb you with spammy messages. You will receive only quality emails.
                    </p>
                </div>
                <div class='blog_sub_p'>
                    <p>Follow us</p>
                </div>
                <div class="mobile_flex">
                    <div class="blog_social_icons blog_twitter blog_social_icons_subscribe">
                        <div>
                            <a href="https://twitter.com/CodeRiders_" rel="nofollow">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.instagram.com/coderiders/" rel="nofollow">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.facebook.com/coderiders.am" rel="nofollow">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.linkedin.com/company/coderiders-l.l.c./" rel="nofollow">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://plus.google.com/u/0/b/115289407140811489789/115289407140811489789" rel="nofollow">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.youtube.com/channel/UCZvepNUeitaoLVhMCPop0ig" rel="nofollow">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog_title_h3 col-lg-12 col-md-12 col-sm-12 mobile_no_display">
                <div class="row">
                    <?php
                    if(!empty($data['trending_blogs'])) { ?>
                        <div class="col-lg-12 lpdl-0">
                            <h3>trending blogs</h3>
                        </div>
                    <?php }?>
                    <?php
                        if(!empty($data['trending_blogs'])) {
                            $content = '';

                            foreach ($data['trending_blogs'] as $trending_blog) {
                                if($trending_blog['id'] == $data['target_blog']['id']) {
                                    continue;
                                }

                                $date = date_create($trending_blog['created_at']);
                                $date = date_format($date,"d.m.Y");

                                $blog_content = strip_tags($trending_blog['content']);
                                $blog_content_length = mb_strlen($blog_content);
                                $blog_content = substr($blog_content, 0, $need_to_split)."...";

                                $content .= '<div class="col-lg-12 col-md-5 col-sm-5 home_blogs blog_padding_left blog_inner_left sm-pr-20">
                                                 <a href="/blog/'.$trending_blog['slug'].'" class="blog_links">
                                                     <div>
                                                         <img src="/public/uploads/'.$trending_blog['image'].'" class="hover_scale">
                                                     </div>
                                                     <div class="blog_title_h3">
                                                         <h3>'.$trending_blog['title'].'</h3>
                                                     </div>
                                                     <div>
                                                         <p class="blog_date_small">'.$date.'</p>
                                                     </div>
                                                     <div>
                                                         <p class="home_blogs_text">'.$blog_content.'</p>
                                                     </div>
                                                 </a>
                                                 <div>
                                                     <div class="blog_social_icons blog_twitter">
                                                         <div>
                                                             <a href="#" onclick="window.open(\'https://twitter.com/intent/tweet?url='.$page_main_url.'/blog/'.$trending_blog["slug"].'\', \'\', \'_blank, width=575, height=400, resizable=yes, scrollbars=yes\'); return false;" rel="nofollow">
                                                                 <i class="fa fa-twitter" aria-hidden="true"></i>
                                                             </a>
                                                         </div>
                                                     </div>
                                                     <div class="blog_social_icons">
                                                         <div>
                                                             <a href="#" onclick="share_fb(\''.$page_main_url.'/blog/'.$trending_blog["slug"].'\');return false;" rel="nofollow" target="_blank">
                                                                 <i class="fa fa-facebook" aria-hidden="true"></i>
                                                             </a>
                                                         </div>
                                                     </div>
                                                     <div class="blog_social_icons">
                                                         <div>
                                                             <a href="#" onclick="window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$page_main_url.'/blog/'.$trending_blog["slug"].'&title='.urlencode($trending_blog['title']).'&summary='.urlencode($trending_blog['page_description']).'&source='.$page_main_url.'/blog/'.$trending_blog['slug'].'\', \'\', \'_blank, width=500, height=500, resizable=yes, scrollbars=yes\');return false;" rel="nofollow">
                                                                 <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                             </a>
                                                         </div>
                                                     </div>
                                                     <div class="blog_social_icons">
                                                         <div>
                                                             <a href="https://plus.google.com/share?url='.$page_main_url.'/blog/'.$trending_blog["slug"].'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;"  rel="nofollow">
                                                                 <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                             </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>';
                            }
                            echo $content;
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 blog_img_div blog_img_div_right blog_right_bg blog_help">
                <div><h3>Customized software solutions based on your business needs</h3></div>
                <div>
                    <p>
                        Weather you need e-Commerce, CRM, BI, Integrations, Big Data or Real time dashboard solutions - CodeRiders is here to analyze your needs and come up with a comprehensive software solution!
                    </p>
                </div>
                <div class="p-0 links black_link green_link long_text blog_link blog_load_more blog_load_more_right">
                    <a href="/solutions" class="mobile_links_padding">Explore Solutions</a>
                </div>
                <img src="/public/images/blog/table2.jpg">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 blog_img_div blog_img_div_right blog_help">
                <div><h3>Having Development needs?</h3></div>
                <div>
                    <p>
                        CodeRiders professionals will solve your problems with web and mobile development, in building custom software, outsourcing software services, or just consulting your development needs.
                    </p>
                </div>
                <div class="p-0 links black_link green_link long_text blog_link blog_load_more blog_load_more_right blog_load_more_right_bg">
                    <a href="/services" class="mobile_links_padding">Explore Services</a>
                </div>
                <img src="/public/images/blog/starting-a-blog-in-2017-1024x683.jpg">
            </div>
        </div>
    </div>
</div>
