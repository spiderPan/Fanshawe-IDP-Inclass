// could wrap all of this in a class or an object and expand on the API to include all of the front-end API interactions (GET, PUT, POST for CMS etc)

// SendMail would be just one member / property in that object

async function SendMail(targetForm) {
    // mail stuff goes here
    let formData = new FormData(targetForm);

    // TODO: examine the method and incrementally build out the fetch call. currently it assumes POST

    let result = await fetch(`${targetForm.getAttribute("action")}`, {
        method: targetForm.method,
        // TODO: a GET request doesn't use body, so this member should be conditional
        body: formData,
    }).then(response => {
        if (response.status !== 200) {
            throw new Error(`Mail submission failed: ${response.status}`);

            // could examine status code here and return it as part of an error object to the .catch handler in the SendMail then-able chain in main.js
        }

        return response;
    })

    let mailStatus = await result.json();

    return mailStatus;
}

export { SendMail };