import { mount } from "@vue/test-utils";
import CoordinateForm from "../src/components/CoordinateForm.vue";

describe("CoordinateForm", () => {
  it("blokuje przycisk gdy dane są niepełne", async () => {
    const wrapper = mount(CoordinateForm);

    const button = wrapper.find("button");
    expect(button.attributes("disabled")).toBeDefined();
  });
});
