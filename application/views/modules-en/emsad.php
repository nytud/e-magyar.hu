<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            
            <h3><span>emSad</span> - Speech activity detector</h3>
            <h4>Abut the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>The Speech Activity Detection (SAD) module carries out speech segmentation on audio files. Three kinds of segments are defined: speech, silence and noise. A fájlokat háromféle szegmensre bontja:
                beszéd, csend és zaj. Speech Activity Detection is the first step preceding any further speech processing.</p>
            <h5>What is the input?</h5>
            <p>An audio file in either .wav, .mp3 or .raw format In case of a .raw file one has  provide the appripriate parameters. 
                (16 kHz, 16 bit little endian).</p>
            <h5>What is the output?</h5>
            <p>The module can create three kinds of output: segment file in SHOUT format (listing segments and their length), audio file cut into segments and three files merging segments according to their type: a merged speech- , a noise- and a silence file.</p>
            <h5>An example.</h5>
            <p>Input: radio broadcast
                <br>Output: SPEAKER SpeechNonSpeech 5 1.220 1.040 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt; SPEAKER SpeechNonSpeech 5 2.260 3.950 &lt;NA&gt; &lt;NA&gt; SOUND &lt;NA&gt; SPEAKER SpeechNonSpeech 5 6.210 0.750 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt;</p>

            <br/>
            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td>
                            <a href="https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Source language</td>
                        <td>Python 3</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>.wav, .mp3, or any other audio format supported by the SoX (Sound Exchange) tool. </td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>Two RTTM-compatible (Rich Transcription Time Marked) files created as the output of the SHOUT tool, and/or one audio file (.wav) per segment, and/or one merged audio file per segment type (.wav).</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>                            
                            <span class="code">python3 sad.py -i input.wav -m shout.sad (see also --help)</span> 
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
