<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emdia"><span>emDia</span> - Speaker diariser</h3>

            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>When analysing a recording with multiple speakers, the program emDia can tell "who is speaking when". This s called speaker diarisation. It can tell the difference between speech sounds and recognises when speakers are taking turns.</p>
            <h5>What is the input?</h5>
            <p>A sound file (e.g. in .wav or .mp3 format).</p>
            <h5>What is the output?</h5>
            <p>A text file conforming the standards used in this field (RTTM (Rich Transcription Time Marked) format), which contains information on which speaker  is talking in a given section of the recording, listed row by row. The algorithm only detects speaker changes, not speaker identities.</p>
            <h5>An example:</h5>
            <p>An example for an output file part (speaker change at the 47th second of the recording, a new speaker taking turn):</p>
            <p>SPEAKER SpeechNonSpeech 1 46.670 0.300 &lt;NA&gt; &lt;NA&gt; SPK01 &lt;NA&gt;
                <br><span style="color: #308BC1;">SPKR-INFO SpeechNonSpeech 1 &lt;NA&gt; &lt;NA&gt; &lt;NA&gt; unknown SPK16 &lt;NA&gt;</span>
                <br>SPEAKER SpeechNonSpeech 1 46.970 2.220 &lt;NA&gt; &lt;NA&gt; SPK16 &lt;NA&gt;</p>

            <br/>
            
            <h4>For developers:</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td>
                            <a href="https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Source language</td>
                        <td>Python</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>.wav, .mp3, or any other audio format supported by the SoX (Sound Exchange) tool.</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>Two RTTM-compatible files created as the output of the SHOUT tool, which contain information on speech-silence-noise, and the different audio segments assigned to the respective speakers.
                        </td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>                            
                            <span class="code">python em-dia.py [-h] [-m SHOUT_MODEL] [-s SAD_FN] input_fn output_dir shout_dir</span>                            
                            <br/>The meanings of the arguments can be accessed via the em-dia.py --help command. 
                        </td>
                    </tr>
                    <tr>
                        <td>Licence</td>
                        <td>GPL</td>
                    </tr>                   
                </table>
            </div>

        </article>
    </div>
</section>