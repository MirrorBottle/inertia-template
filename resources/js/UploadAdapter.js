export default class UploadAdapter {
    constructor(loader) {
        // The file loader instance to use during the upload.
        this.loader = loader;
        this.url = "https://gkiibpn.com/admin/blog/upload";
    }

    // Starts the upload process.
    upload() {
        return this.loader.file.then(
            (file) =>
                new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append("upload", file);

                    axios({
                        url: this.url,
                        method: "post",
                        data,
                        headers: {
                            "Content-Type": "multipart/form-data;",
                        },
                        withCredentials: false,
                    })
                        .then((response) => {
                            if (response.status) {
                                console.log(response.data.default);
                                resolve({
                                    default: response.data.default,
                                });
                            } else {
                                reject(response.message);
                            }
                        })
                        .catch((response) => {
                            reject("Upload failed");
                        });
                })
        );
    }
}
