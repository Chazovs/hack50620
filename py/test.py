#!/usr/bin/env python
# coding: utf8
from __future__ import unicode_literals, print_function

import plac
import random
import warnings
from pathlib import Path
import spacy
from spacy.util import minibatch, compounding

TEST_TEXTES = [
    "Течет Обь по полюшку, да лошади мчат",
    "Во поле лошади стояли"
]

def main(model='./model', new_model_name="animal", output_dir='./model', n_iter=30):
    nlp = spacy.load(model)  # load existing spaCy model
    print("Loaded model '%s'" % model)
    
    # test the trained model
    test_text = "Течет Обь по полюшку, да лошади мчат"
    doc = nlp(test_text)
    print("Entities in '%s'" % test_text)
    for ent in doc.ents:
        print(ent.label_, ent.text)


if __name__ == "__main__":
    plac.call(main)
