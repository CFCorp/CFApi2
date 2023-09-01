import sys
import json
import os

from jinja2_static import Builder

build = Builder()
argument = sys.argv[1] if len(sys.argv) > 1 else None

with open("./data.json", "r", encoding="utf-8") as f:
    data = json.load(f)


build.generate(
    debug=False if argument == "build" else True,
    URL="https://api.computerfreaker.pw", data=data,
    minify_html=True
)
