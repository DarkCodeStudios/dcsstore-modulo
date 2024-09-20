from setuptools import setup, find_packages

setup(
    name="dcsstore",
    version="0.1.0",
    description="Modulo per migliorare le prestazioni e la sicurezza del tuo server Python",
    long_description=open("README.md").read(),
    long_description_content_type="text/markdown",
    author="DCS - Store",
    author_email="dcs.store.help@gmail.com",
    url="https://github.com/DarkCodeStudios/dcsstore-module",
    packages=find_packages(),
    classifiers=[
        "Programming Language :: Python :: 3",
        "License :: OSI Approved :: MIT License",
        "Operating System :: OS Independent",
    ],
    python_requires='>=3.6',
    install_requires=[
        "bcrypt",
        "bleach",
        "redis",
        "sqlalchemy"
    ],
)
