def commit_callback(commit):
    authors_to_remove = [b"dhanya dwivedi", b"Tanya Shrivastava"]
    if commit.author_name in authors_to_remove:
        commit.skip()
