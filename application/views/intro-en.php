<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">        
        <article class="introduction">
            <h3 class="text-center">Welcome to the home page of the <br/>e-magyar.hu Digital Language Processing Toolchain!</h3>
            <br/>
            <br/>
            <p>
                The toolchain <strong>e-magyar.hu</strong> contains the basic tools for an automated processing of Hungarian in an integrated and 
                standardised framework. We are offering tools that can prove useful both on their own and as a toolchain for researchers, 
                developers of intelligent applications, and for the wide public, as well. These tools provide an indispensable infrastructure 
                for the digital processing of Hungarian, for the support of digital language use in Hungarian.
            </p>
            <p>
                Computational processing of Hungarian is not exclusively linguists’ business. In the age of digital communication we are 
                connected through notebooks, tablets and smart phones, and we communicate to an increasing extent with machines. All this 
                takes place in human language, which presupposes that these tools and systems get smarter linguistically, as well, in order 
                for them to be our useful helpers. The long-term goal is that these tools and applications understand our language. Although 
                we are far from that at the moment, but the tools presented here are a first step in this direction. No intelligent 
                application may be devised in Hungarian without these, and in a wider sense without these it is impossible to put Hungarian 
                on equal terms with languages with greater support in the digital space.
            </p>            
            <p>
                It was an important goal to provide open access for the source code of the toolchain for both R&D and industrial use. 
                Besides addressing professional users, we are trying to meet the needs of laymen and non-professional researchers in 
                two ways. One way is a <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/parser">web service</a>
                running on our homepage, which returns the input texts in the analysed format. The other way of meeting the needs of those 
                requiring a more complex analysis is enabling the integration of the tools in e-magyar.hu in the internationally 
                well-known language processing architecture GATE. (More details about this option may be read 
                <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/gate">here</a>.
            </p>
            <br/>
            <p>
                <strong>e-magyar.hu</strong> was developed with the support of the Hungarian Academy of Sciences, within the framework of 
                an infrastructure improvement grant starting in 2015. The development was carried out in wide cooperation of several 
                major Hungarian R&D centres, under the leadership of the Research Institute for Linguistics. The new infrastructure improved, 
                standardised and integrated the existing tools that had been developed in these centres. 
            </p>
            <p>
                The infrastructure has two distinct components. One of them processes written texts (for more information see <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/textoverview">here</a>),
                the other aids speech processing with a speech-database and speech analysing modules (for more information see <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/speechoverview">here</a>). 
                The text processing module was developed under the direction of <strong>Csaba Oravecz</strong>, the speech processing module under the direction of <strong>András Kornai</strong>, while the overall work was coordinated by <strong>Tamás Váradi</strong>.
            </p>
            <br/>
            <br/>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                    <p>
                        Partner institutes:
                    </p>
                    <p>
                        <a href="http://www.nytud.hu/" target="_blank">Research Institute for Linguistics, HAS</a><br/>
                        <a href="http://www.aitia.ai/" target="_blank">AITIA International Inc.</a><br/>
                        <a href="http://www.u-szeged.hu/" target="_blank">University of Szeged</a><br/>
                        <a href="https://www.sztaki.hu/mtasztaki/az_intezet/" target="_blank">Institute for Computer Science and Control, HAS</a><br/>
                        <a href="https://ppke.hu/" target="_blank">Pázmány Péter Catholic University</a><br/>
                        <a href="http://www.morphologic.hu/" target="_blank">Morphologic Ltd.</a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
                    <img src="<?php echo base_url(); ?>css/images/photo.jpg" class="img-responsive thumbnail" />
                </div>
            </div>            
        </article>
    </div>
</section>