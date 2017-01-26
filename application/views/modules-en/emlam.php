<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>

            <h3 id="emlam"><span>emLam</span> - Language model</h3>
            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>The main task of language models is to support other NLP tools. Its goal is to judge how well a sentence or just a single word fits the rules of Hungarian, or how native an utterance sounds. It is useful for example in speech recognition, where it helps choose the most probable alternative from several options (e.g. „a hosszú béke” or „a hosszú béka”).
                Similar models are used by textual search engines in order to list search expressions resembling the one typed in.
                Besides these, language models can be used for generating texts, as well.</p>
            <h5>What is the input?</h5>
            <p>If we are just curious how much a text we have created resembles those found in the
                <a href="http://mnsz.nytud.hu/" target="_blank">Hungarian National Corpus (Magyar Nemzeti Szövegtár)</a>,
                we should simply type in our sentences or paragraphs.</p>
            <h5>What is the output?</h5>
            <p>The default output is the probability of our text.</p>
            <h5>An example:</h5>
            <p>If, according to the model, the probability is 1 : 1000000, then on average our sentence will have one exact occurance among one million sentences in the HNC.  
                In its generating mode the model is capable of creating text, as well. However, no special consistency should be expected from it.
            </p>
            
            <?php $this->load->view('emlam-demo'); ?>

            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td><a href="<?php echo base_url(); ?>emlam/lemmad_u50_krs.lm5.gz" download>a "de-glutinised"  (suffixes treated as separate tokens) 5-gram model </a></td>
                    </tr>
                    <tr>
                        <td>Source code</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>One sentence per row, space between the tokens (emToken may be used for tokenisation). The version above treats both lemmas (sometimes with their suffixes) and endings as separate tokens.</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>The probability of our text, optionally segmented into sentences and words.</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>
                            Using the 'ngram' program of the SRILM toolkit:
                            <br/>
                            <span class="code">ngram -order 5 -lm lemmad_u50_krs.lm5.gz -ppl &lt;text file&gt;</span>                            
                            <br/>
                            Parameters: -order 5: 5-grams should be used (at the moment this is the largest possibility); -lm lemmad_u50_krs.lm5.gz: uses the "de-glutinised" model above, which had been trained on words with a frequency of more than 50 occurance; -ppl &lt;text file&gt;: our own text file should be specified here
                        </td>
                    </tr>
                    <tr>
                        <td>Licence</td>
                        <td>open CC BY</td>
                    </tr>                   
                </table>
            </div>

        </article>
    </div>
</section>