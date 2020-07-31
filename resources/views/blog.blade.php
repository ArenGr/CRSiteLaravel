<?php
    $image_alt = "";
    $image_title = "";

    if(!empty($data['main_blog'])) {
        if((!empty($data['main_blog']['image_alt']))) {
            $image_alt = $data['main_blog']['image_alt'];
        }
        if((!empty($data['main_blog']['image_title']))) {
            $image_title = $data['main_blog']['image_title'];
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
    .blogs-row{
        overflow: hidden;
        margin-bottom: 20px;
    }
    @media screen and (max-width: 800px) {
        body{
            background: #fff url(/public/images/mobile_grey_lines.png) repeat;
            background-position: left top;
            background-size: contain;
        }
    }
</style>
<div class="container blog_cont pdr-12 pdl-12 pdb-20">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 white_titles blog_inner_sections" style="padding-left:84px;">
            <div class="indent">
                <span class="not_tag">&lt;h1&gt;</span>
                <h2 class='blog_titles' style='font-size:40px;'>BLOG</h2>
                <span class="not_tag">&lt;/h1&gt;</span>
            </div>
                <?php
                    if(!empty($data['main_blog'])) {
                        $content = strip_tags($data['main_blog']['content']);
                        $content_length = mb_strlen($content);
                        $need_to_split = 200;
                        $content = substr($content, 0, $need_to_split)."...";

                        $date = date_create($data['main_blog']['created_at']);
                        $date = date_format($date,"d.m.Y");

                        echo '<div class="col-lg-12 col-md-12 col-sm-12 home_blogs blog_padding_left mgb-0" style="padding-left: 0; padding-right: 0">
                                  <section class="blog_section pdb-0">
                                      <a href="/blog/'.$data['main_blog']['slug'].'" class="blog_links main_blog_link_handler">
                                          <div>
                                              <img src="/public/uploads/'.$data['main_blog']['image'].'" class="home_blogs_big hover_scale" title="'.$image_title.'" alt="'.$image_alt.'">  
                                          </div>
                                          <div class="blog_title_h3 blog_big_title">
                                              <h3>'.$data['main_blog']['title'].'</h3>
                                          </div>
                                          <div>
                                              <p class="blog_date_small">'.$date.'</p>
                                          </div>
                                          <div  class="blog_big_content">
                                              <p class="home_blogs_text">'. $content .'</p>
                                          </div>
                                      </a>
                                      <div>
                                          <div class="blog_social_icons blog_twitter">
                                              <div>
                                                  <a href="#" onclick="window.open(\'https://twitter.com/intent/tweet?url='.$page_main_url.'/blog/'.$data["main_blog"]["slug"].'\', \'\', \'_blank, width=575, height=400, resizable=yes, scrollbars=yes\'); return false;" rel="nofollow">
                                                      <i class="fa fa-twitter" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                           <div class="blog_social_icons">
                                              <div>
                                                  <a href="#" onclick="share_fb(\''.$page_url.'/'.$data["main_blog"]["slug"].'\');return false;" rel="nofollow" target="_blank">
                                                      <i class="fa fa-facebook" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="blog_social_icons">
                                              <div>
                                                  <a href="#" onclick="window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$page_main_url.'/blog/'.$data["main_blog"]["slug"].'&title='.urlencode($data["main_blog"]['title']).'&summary='.urlencode($data["main_blog"]['page_description']).'&source='.$page_url.'/'.$data["main_blog"]['slug'].'\', \'\', \'_blank, width=500, height=500, resizable=yes, scrollbars=yes\');return false;" rel="nofollow">
                                                      <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="blog_social_icons">
                                              <div>
                                                  <a href="https://plus.google.com/share?url='.$page_main_url.'/blog/'.$data["main_blog"]["slug"].'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;" rel="nofollow">
                                                      <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </section>
                              </div>';
                    }
                ?>
        </div>
        <div class='col-lg-4 col-md-4 col-sm-12 col-xs-12 blog_inner_sections_margin blog_inner_sections'>
            <div class="col-lg-12 col-md-12 col-sm-12 home_blogs blog_padding_left blog_subscribe" style='margin-top:82px;'>
                <div class="blog_sub_title">
                    <p style="font-size: 16px;">Subscribe to Newsletters</p>
                </div>
                <div class="blog_sub_form">
                    <div class="blog_sub_input">
                        {{-- <input id="_token" type="hidden"  value="<?= $_SESSION['_token'] ?>"> --}}
                        <input id="sub_email" type="email" class="subscribe_inp" placeholder="E-MAIL">
                    </div>
                    <div class="blog_sub_button" style="position: relative">
                        <input type="button" class="subscribe_but" value="SUBSCRIBE">
                        <div class="subscribe_load">
                            <div class="subscribe_loader"></div>
                        </div>
                    </div>
                </div>
                <div class="blog_sub_p subscribe_res_message"></div>
                <div class="blog_sub_p">
                    <p>
                        Keep up with the most trending tech news articles. We promise not to disturb you with spammy messages. You will receive only quality emails.
                    </p>
                </div>
                <div class="blog_sub_p">
                    <p>Follow us</p>
                </div>
                <div class="mobile_flex">
                    <div class="blog_social_icons blog_twitter blog_social_icons_subscribe">
                        <div>
                            <a href="https://twitter.com/CodeRiders_" rel="nofollow" target="_blank">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.instagram.com/coderiders/" rel="nofollow" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.facebook.com/coderiders.am" rel="nofollow" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.linkedin.com/company/coderiders-l.l.c./" rel="nofollow" target="_blank">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://plus.google.com/u/0/b/115289407140811489789/115289407140811489789" rel="nofollow" target="_blank">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog_social_icons blog_social_icons_subscribe">
                        <div>
                            <a href="https://www.youtube.com/channel/UCZvepNUeitaoLVhMCPop0ig" rel="nofollow" target="_blank">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = 'row'>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 white_titles blog_inner_sections recent_blogs_part" style="padding-left:84px; padding-right: 20px;">
            <?php
                if(!empty($data['recent_blogs'])) { ?>
                    <div class="blog_title_h3 col-lg-12 col-md-12 col-sm-12 col-xs-12 lpdl-0 mgt-10">
                        <h3>Recent Blogs</h3>
                    </div>
            <?php }?>
            <section class='blog_section blog-recents-container pdb-0'>
                <?php
                    if(!empty($data['recent_blogs'])) {
                        $col  = '';
                        $i = 1;
                        foreach ($data['recent_blogs'] as $blog) {
                            $date = date_create($blog['created_at']);
                            $date = date_format($date,"d.m.Y");

                            $content = strip_tags($blog['content']);
                            $content_length = mb_strlen($content);
                            $need_to_split = 200;
                            $content = substr($content, 0, $need_to_split)."...";
                            if($i % 2 == 1){
                                $col .= '<div class="blogs-row">';
                            }
                            $col  .= '<div class="col-lg-6 col-md-6 col-sm-6 home_blogs blog_containers blog_padding_left">';
                            $col  .= '<a href="/blog/'.$blog['slug'].'" class="blog_links">';
                            $col  .= '<div style="background: url(/public/uploads/'.$blog['image'].')" class="blogs_images_static hover_scale"></div>
                                      <div class="blog_title_h3">
                                          <h3>'.$blog['title'].'</h3>
                                      </div>
                                      <div>
                                          <p class="blog_date_small">'.$date.'</p>
                                      </div>
                                      <div>
                                          <p class="home_blogs_text">'.$content.'</p>
                                      </div>
                                      </a>';
                            $col  .='<div>
                                         <div class="blog_social_icons blog_twitter">
                                             <div>
                                                  <a href="#" onclick="window.open(\'https://twitter.com/intent/tweet?url='.$page_main_url.'/blog/'.$blog["slug"].'\', \'\', \'_blank, width=575, height=400, resizable=yes, scrollbars=yes\'); return false;" rel="nofollow">
                                                      <i class="fa fa-twitter" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                         </div>
                                         <div class="blog_social_icons">
                                             <div>
                                                 <a href="#" onclick="share_fb(\''.$page_url.'/'.$blog["slug"].'\');return false;" rel="nofollow" target="_blank">
                                                      <i class="fa fa-facebook" aria-hidden="true"></i>
                                                 </a>
                                             </div>
                                         </div>
                                         <div class="blog_social_icons">
                                             <div>
                                                  <a href="#" onclick="window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$page_main_url.'/blog/'.$blog["slug"].'&title='.urlencode($blog['title']).'&summary='.urlencode($blog['page_description']).'&source='.$page_url.'/'.$blog['slug'].'\', \'\', \'_blank, width=500, height=500, resizable=yes, scrollbars=yes\');return false;" rel="nofollow">
                                                      <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                  </a>
                                             </div>
                                         </div>
                                         <div class="blog_social_icons">
                                              <div>
                                                  <a href="https://plus.google.com/share?url='.$page_main_url.'/blog/'.$blog["slug"].'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;"  rel="nofollow">
                                                      <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                     </div>';
                            $col .= '</div>';
                            if($i % 2 == 0 || sizeof($data['recent_blogs']) == $i){
                                $col .= '</div>';
                            }
                            $i++;
                        }
                        echo $col;
                        unset($i);
                    }
                ?>
            </section>
            <?php
            if(!empty($data['recent_blogs'])) { ?>
                <div class="col-lg-12 loader_handler">
                    <div class="a" style="--n: 5;">
                        <div class="dot" style="--i: 0;"></div>
                        <div class="dot" style="--i: 1;"></div>
                        <div class="dot" style="--i: 2;"></div>
                        <div class="dot" style="--i: 3;"></div>
                        <div class="dot" style="--i: 4;"></div>
                    </div>
                </div>
                <?php if($data["next_page"] > 0){?>
                <div class="">
                    <div class="mobile_links_mtop mobile_links_padding links black_link blue_link long_text blog_link blog_load_more" style="margin:50px 0 0 0">
                        <a class="blogs_load_more" href="javascript:void(0)" data-offset="<?= count($data['recent_blogs']) ?>" data-load="<?= $data["next_page"] ?>" style="width: 167px;">Load More</a>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 mgt-0 tranding_blog'>
            <?php
            if(!empty($data['trending_blogs'])) { ?>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <div class="blog_title_h3 col-lg-12 col-md-12 col-sm-12 col-xs-12 lpdl-0">
                        <h3>trending blogs</h3>
                    </div>
                </div>
            <?php } ?>
            <section class="small_blogs_div mgb-0" style='margin-top:46px;'>
                <?php
                    if(!empty($data['trending_blogs'])) {
                        $col  = '';
                        foreach ($data['trending_blogs'] as $blog) {
                            $date = date_create($blog['created_at']);
                            $date = date_format($date,"d.m.Y");

                            $col .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 small_blogs_div">';
                            $col .= '<a href="/blog/'.$blog['slug'].'" class="blog_links">';
                            $col .= '<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12" style="padding:0;">
                                         <img src="/public/uploads/'.$blog['image'].'" class="blog_small_img">
                                     </div>
                                     <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding:0;">
                                        <div class="blog_title_h3 small_blog_title">
                                            <h3>'.$blog['title'].'</h3>
                                        </div>
                                        <div>
                                            <p class="blog_date_small blog_date_small_margin">'.$date.'</p>
                                        </div>
                                     </div>';
                            $col .= '</a>';
                            $col  .='<div class="trending_mobile_share">
                                         <div class="blog_social_icons blog_twitter">
                                             <div>
                                                  <a href="#" onclick="window.open(\'https://twitter.com/intent/tweet?url='.$page_main_url.'/blog/'.$blog["slug"].'\', \'\', \'_blank, width=575, height=400, resizable=yes, scrollbars=yes\'); return false;" rel="nofollow">
                                                      <i class="fa fa-twitter" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                         </div>
                                         <div class="blog_social_icons">
                                             <div>
                                                 <a href="#" onclick="share_fb(\''.$page_url.'/'.$blog["slug"].'\');return false;" rel="nofollow" target="_blank">
                                                      <i class="fa fa-facebook" aria-hidden="true"></i>
                                                 </a>
                                             </div>
                                         </div>
                                         <div class="blog_social_icons">
                                             <div>
                                                  <a href="#" onclick="window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$page_main_url.'/blog/'.$blog["slug"].'&title='.urlencode($blog['title']).'&summary='.urlencode($blog['page_description']).'&source='.$page_url.'/'.$blog['slug'].'\', \'\', \'_blank, width=500, height=500, resizable=yes, scrollbars=yes\');return false;" rel="nofollow">
                                                      <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                  </a>
                                             </div>
                                         </div>
                                         <div class="blog_social_icons">
                                              <div>
                                                  <a href="https://plus.google.com/share?url='.$page_main_url.'/blog/'.$blog["slug"].'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\'); return false;"  rel="nofollow">
                                                      <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                  </a>
                                              </div>
                                          </div>
                                     </div>';
                            $col .= '</div>';
                        }
                        echo $col;
                    }
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 blog_img_div blog_img_div_right blog_right_bg mobile-clear">
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
                <div class="col-lg-12 col-md-12 col-sm-12 blog_img_div blog_img_div_right">
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
            </section>
        </div>
    </div>
</div>
