import { mount } from "@vue/test-utils";
import CoordinateForm from "../src/components/CoordinateForm.vue";

describe("CoordinateForm", () => {
  it("disables submit button initially", () => {
    const wrapper = mount(CoordinateForm);
    const button = wrapper.find("button");
    expect(button.attributes("disabled")).toBeDefined();
  });
});
