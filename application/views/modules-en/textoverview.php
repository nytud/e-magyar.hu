
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3>Overview</h3>
            <br/>
            <p>
                The essence of the Digital Text Processing System <strong>e-magyar.hu</strong> is to automatically realise 
                the basic, initial steps of text reception and comprehension – tasks requiring human intelligence: the linguistic 
                characteristics of a text are automatically revealed and made explicit. Processing any given text means that each 
                word is part-of-speech-tagged, lemmatised and is analysed morphologically, the sentences are analysed syntactically 
                (yielding two analyses), furthermore the nominal phrases and named entities are marked, as well. The toolchain 
                gathers, integrates and presents the respective NLP tools in a unified system, making them accessible and directly 
                usable for user groups with different needs. 
                
            </p>
            <p>
                The text processing module of e-magyar.hu has the following modules:         
            </p>
            <ul>
                <li>Tokeniser – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtoken">emToken</a></li>
                <li>Morphological analyser – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emmorph">emMorph</a></li>
                <li>Word stemmer (Lemmatiser) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emlem">emLem</a></li>
                <li>POS Tagger – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtag">emTag</a></li>
                <li>Dependency parser – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emdep">emDep</a></li>
                <li>Constituent parser – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emcons">emCons</a></li>
                <li>NP Chunker (partial syntactic analyser) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emchunk">emChunk</a></li>
                <li>NER Tagger – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emner">emNer</a></li>
            </ul>
            <p>
                A description of the respective tools is available under their direct link.        
            </p>

            <h4>Example</h4>
            <p>
                <i>Bár külföldre menekülhetett volna, nem tette meg. Támogatta a haladó eszméket, barátságban állt pl. Jókai Mórral is.</i> 
            </p>
            <p>
                When automatically processing the above text, the first step is to determine the sentence boundaries and to segment 
                the text into so-called tokens: the basic units of the text, comprising of words and punctuation marks. In the above 
                example <i>Támogatta</i> starts a new sentence, but <i>Jókai</i> does not, even though a period is followed by a word with an initial 
                capital letter in both cases – which generally signals a sentence boundary. Punctuation marks are dealt with separately, 
                except for when they occur as part of abbreviations, which include the period, as well. Accordingly, <i>pl.</i> will count as 
                one unit, while <i>is</i> and the period following it will count as two units.
            </p>
            <p>
                We also arrive at morphological information about each word form: menekülhetett is a verb in past tense, having <i>menekül</i> 
                as a lemma, and <i>-hat / -het</i> as a suffix and <i>-ett</i> as verb ending.
            </p>
            <p>
                The majority of Hungarian word forms (up to 30%) have multiple morphological analyses. In such cases the system automatically 
                choses one of the possible alternatives, relying on the context. This step is called disambiguation. Ambiguity is not always 
                as obvious as in the case of <i>várnak</i> or <i>terem</i>, in many cases it is quite hidden. It is important for example to 
                analyse <i>haladó</i> as an adjective, and not as a compound noun referring to some kind of a tax related to fish.
            </p>
            <p>
                The syntactic analysis of the sentences is carried out in two different ways. One is a so-called dependency parsing, which 
                yields the relations of the words to each other (such as <i>barátságban</i> being an adverb related to the verb <i>állt</i>). The other 
                syntactic analysis is called constituency parsing. This returns the constituents of the sentence; in the example above the 
                sentence is made up of two larger units, which are coordinated. Thanks to the dependency parsing verb + prefix relations are 
                also at our disposal. Using this information a separate module marks separable prefixes and their related verbs, in the 
                example above: <i>tette</i> and <i>meg</i>.                
            </p>
            <p>
                Nominal phrases – such as <i>haladó eszméket</i> – are also identified by a specific module. .
            </p>
            <p>
                The last module of the toolchain marks subclasses of propoer names, such as place- or organisation names, person 
                names, such as <i>Jókai Mór</i> in our example.
            </p>
            
            <img src="<?= base_url(); ?>css/images/text-flowchart.png" class="img-responsive" style="margin: 20px auto 0 auto;" />
            
        </article>
    </div>
</section>
