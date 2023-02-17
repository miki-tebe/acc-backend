import { exec } from "child_process";
import fs from "fs";

export default function (
    /** @type {import('plop').NodePlopAPI} */
    plop
) {
    // create your generators here
    plop.setGenerator("basics", {
        description: "this is a skeleton plopfile",
        prompts: [
            {
                type: "input",
                name: "name",
                message: "Name your resource: ",
            },
        ], // array of inquirer prompts
        actions: [
            function customAction(answers) {
                const name = answers.name.replace(" ", "_");
                exec(
                    `php artisan make:migration create_${name}_table`,
                    (err, stdout, stderr) => {
                        if (err) {
                            console.log(err);
                            return;
                        }
                        console.log(stdout);
                    }
                );
                return `migration for ${answers.name} created`;
            },
            {
                type: "add",
                path: "app/Models/{{properCase name}}.php",
                templateFile: "templates/model.template.hbs",
            },
            {
                type: "add",
                path: "app/Http/Controllers/{{properCase name}}Controller.php",
                templateFile: "templates/controller.template.hbs",
            },
        ], // array of actions
    });
}
